<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    // 1. LISTADO PRINCIPAL (Con el Triple Join que ya arreglamos)
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('usuarios u');
        $builder->select('u.*, r.nombre_rol, p.nombre_plan');
        $builder->join('roles r', 'u.id_rol = r.id_rol');
        $builder->join('usuarios_planes up', 'u.id_usuario = up.id_usuario', 'left');
        $builder->join('planes p', 'up.id_plan = p.id_plan', 'left');
        
        $data = [
            'titulo'   => 'Gestión de Usuarios',
            'usuarios' => $builder->get()->getResultArray()
        ];

        return view('admin/usuarios/index', $data);
    }

    // 2. GUARDAR NUEVO USUARIO (Viene desde el Modal de tu Index)
    public function guardar()
    {
        $model = new UsuariosModel();
        
        $data = [
            'nombre_usuario'   => $this->request->getPost('nombre'),
            'ap_usuario'       => $this->request->getPost('ap'),
            'am_usuario'       => $this->request->getPost('am'),
            'sexo_usuario'     => $this->request->getPost('sexo'),
            'email_usuario'    => $this->request->getPost('email'),
            'password_usuario' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'id_rol'           => $this->request->getPost('id_rol'),
            'estatus_usuario'  => 1 // Lo creamos como activo por defecto
        ];

        $model->insert($data);
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario registrado con éxito.');
    }

    // 3. CAMBIAR ROL RÁPIDO (La función que ya tenías)
    public function cambiar_rol($id_usuario)
    {
        $model = new UsuariosModel();
        $nuevo_rol = $this->request->getPost('id_rol');

        if ($nuevo_rol) {
            $model->update($id_usuario, ['id_rol' => $nuevo_rol]);
            return redirect()->to('/admin/usuarios')->with('success', 'Rol actualizado correctamente.');
        }

        return redirect()->back()->with('error', 'No se seleccionó un rol.');
    }

    // 4. MOSTRAR FORMULARIO DE EDICIÓN (La que te causaba el 404)
    public function editar($id)
    {
        $model = new UsuariosModel();
        $usuario = $model->find($id);

        if (!$usuario) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        $data = [
            'titulo'  => 'Editar Usuario',
            'u'       => $usuario
        ];

        return view('admin/usuarios/editar', $data);
    }

    // 5. ACTUALIZAR DATOS EDITADOS
    public function actualizar($id)
    {
        $model = new UsuariosModel();

        $data = [
            'nombre_usuario' => $this->request->getPost('nombre'),
            'ap_usuario'     => $this->request->getPost('ap'),
            'am_usuario'     => $this->request->getPost('am'),
            'sexo_usuario'   => $this->request->getPost('sexo'),
            'email_usuario'  => $this->request->getPost('email'),
            'id_rol'         => $this->request->getPost('id_rol')
        ];

        // Si el admin puso una nueva contraseña, la encriptamos y actualizamos
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password_usuario'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to('/admin/usuarios')->with('success', 'Los datos se actualizaron correctamente.');
    }
}
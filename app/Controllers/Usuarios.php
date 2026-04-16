<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\RolesModel; // Necesitarás este para el dropdown de roles

class Usuarios extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('usuarios u');
        $builder->select('u.*, r.nombre_rol, p.nombre_plan');
        $builder->join('roles r', 'u.id_rol = r.id_rol');
        $builder->join('planes p', 'u.id_plan = p.id_plan', 'left'); // Left por si no tiene plan aún
        $query = $builder->get();

        $data = [
            'titulo'   => 'Gestión de Usuarios',
            'usuarios' => $query->getResultArray()
        ];

        return view('admin/usuarios/index', $data);
    }

    public function cambiar_rol($id_usuario)
    {
        $model = new UsuariosModel();
        $nuevo_rol = $this->request->getPost('id_rol');

        $model->update($id_usuario, ['id_rol' => $nuevo_rol]);

        return redirect()->to('/admin/usuarios')->with('success', 'Rol actualizado correctamente.');
    }

    public function crear()
{
    $db = \Config\Database::connect();
    
    // Traemos roles y planes para los select del formulario
    $data = [
        'titulo' => 'Agregar Nuevo Usuario',
        'roles'  => $db->table('roles')->get()->getResultArray(),
        'planes' => $db->table('planes')->get()->getResultArray()
    ];

    return view('admin/usuarios/crear', $data);
}

public function guardar()
{
    $model = new \App\Models\UsuariosModel();

    $data = [
        'nombre_usuario'   => $this->request->getPost('nombre'),
        'ap_usuario'       => $this->request->getPost('ap_paterno'),
        'am_usuario'       => $this->request->getPost('ap_materno'),
        'email_usuario'    => $this->request->getPost('email'),
        // Encriptamos la contraseña por seguridad
        'password_usuario' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'sexo_usuario'     => $this->request->getPost('sexo'),
        'id_rol'           => $this->request->getPost('id_rol'),
        'id_plan'          => $this->request->getPost('id_plan'),
        'estatus_usuario'  => 1 // Activo por defecto
    ];

    if ($model->insert($data)) {
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario creado correctamente.');
    } else {
        return redirect()->back()->with('error', 'Error al crear el usuario.');
    }

}

public function eliminar($id)
{
    $model = new \App\Models\UsuariosModel();
    
    // Verificamos si el usuario existe antes de intentar borrar
    if ($model->find($id)) {
        $model->delete($id);
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario eliminado correctamente.');
    }

    return redirect()->to('/admin/usuarios')->with('error', 'No se encontró el usuario.');
}
}
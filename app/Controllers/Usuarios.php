<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
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

    // ¡ESTA ES LA QUE TE FALTA O TIENE ERROR!
    public function cambiar_rol($id_usuario)
    {
        $model = new UsuariosModel();
        
        // Obtenemos el nuevo ID de rol desde el select del formulario
        $nuevo_rol = $this->request->getPost('id_rol');

        if ($nuevo_rol) {
            $model->update($id_usuario, ['id_rol' => $nuevo_rol]);
            return redirect()->to('/admin/usuarios')->with('success', 'Rol actualizado.');
        }

        return redirect()->back()->with('error', 'No se seleccionó un rol.');
    }
}
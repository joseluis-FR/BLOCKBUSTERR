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
}
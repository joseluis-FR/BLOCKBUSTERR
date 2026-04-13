<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    // 1. Panel para el Administrador (Rol 745)
    public function admin()
    {
        $session = session();
        // Doble validación de seguridad por Rol
        if ($session->get('id_rol') != 745) {
            return redirect()->to('/salir'); 
        }
        

        $data = [
            'titulo' => 'Panel de Administración',
            'nombre' => $session->get('nombre')
        ];

        // Por ahora cargamos una vista genérica o un mensaje
        return view('admin/inicio', $data);
    }

    // 2. Panel para el Operador (Rol 125)
    public function operador()
    {
        $session = session();
        if ($session->get('id_rol') != 125) {
            return redirect()->to('/salir');
        }

        $data = [
            'titulo' => 'Panel de Operador',
            'nombre' => $session->get('nombre')
        ];

        return view('operador/inicio', $data);
    }

    // 3. Panel para el Cliente (Rol 58)
    public function cliente()
{
    $session = session();
    if ($session->get('id_rol') != 58) {
        return redirect()->to('/salir');
    }

    // Instanciamos el modelo de Streaming para traer las películas
    $streamingModel = new \App\Models\StreamingModel();

    $data = [
        'titulo'    => 'Catálogo de Estrenos',
        'nombre'    => $session->get('nombre'),
        'peliculas' => $streamingModel->findAll() // Trae todo el catálogo
    ];

    //dd($streamingModel->first());

    return view('cliente/inicio', $data);
}

public function mis_alquileres()
{
    $session = session();
    $id_usuario = $session->get('id_usuario');

    // Usamos el Query Builder para unir las tablas
    $db = \Config\Database::connect();
    $builder = $db->table('alquileres a');
    $builder->select('a.*, s.nombre_streaming, s.caratula_streaming');
    $builder->join('streaming s', 'a.id_streaming = s.id_streaming');
    $builder->where('a.id_usuario', $id_usuario);
    $query = $builder->get();

    $data = [
        'titulo' => 'Mis Alquileres',
        'alquileres' => $query->getResultArray()
    ];

    return view('cliente/mis_alquileres', $data);
}
}
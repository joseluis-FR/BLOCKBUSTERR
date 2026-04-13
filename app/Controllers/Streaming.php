<?php

namespace App\Controllers;

use App\Models\StreamingModel;
use App\Models\GenerosModel;

class Streaming extends BaseController
{
    // Listado de películas para el Administrador
    public function index()
    {
        $model = new StreamingModel();
        $data = [
            'titulo' => 'Gestión de Catálogo',
            'peliculas' => $model->findAll()
        ];

        return view('admin/streaming/index', $data);
    }

    // Formulario para agregar nueva película
   /* public function crear()
    {
        $generosModel = new GenerosModel();
        $data = [
            'titulo' => 'Agregar Nuevo Contenido',
            'generos' => $generosModel->findAll()
        ];

        return view('admin/streaming/crear', $data);
    }*/

    public function crear()
{
    $generosModel = new \App\Models\GenerosModel();
    $data = [
        'titulo'  => 'Agregar Contenido',
        'generos' => $generosModel->findAll()
    ];
    return view('admin/streaming/crear', $data);
}

public function guardar()
{
    $model = new \App\Models\StreamingModel();

    // Captura de datos
    $data = [
        'nombre_streaming'       => $this->request->getPost('nombre'),
        'sipnosis_streaming'     => $this->request->getPost('sipnosis'),
        'clasificacion_streaming'=> $this->request->getPost('clasificacion'),
        'tipo_streaming'         => $this->request->getPost('tipo'),
        'caratula_streaming'     => $this->request->getPost('caratula'), // Link o nombre de archivo
        'id_genero'              => $this->request->getPost('id_genero'),
    ];

    if ($model->insert($data)) {
        return redirect()->to('/admin/streaming')->with('success', 'Contenido agregado correctamente.');
    } else {
        return redirect()->back()->with('error', 'Error al guardar.');
    }
}
}
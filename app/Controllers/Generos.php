<?php

namespace App\Controllers;

use App\Models\GenerosModel;

class Generos extends BaseController
{
    public function index()
    {
        $model = new GenerosModel();
        $data = [
            'titulo'  => 'Gestión de Géneros',
            'generos' => $model->findAll()
        ];
        return view('admin/generos/index', $data);
    }

    public function guardar()
    {
        $model = new GenerosModel();
        $nombre = $this->request->getPost('nombre_genero');

        if ($nombre) {
            $model->insert(['nombre_genero' => $nombre]);
            return redirect()->to('/admin/generos')->with('success', 'Género agregado.');
        }
        return redirect()->back()->with('error', 'El nombre es obligatorio.');
    }

    public function eliminar($id)
    {
        $model = new GenerosModel();
        $model->delete($id);
        return redirect()->to('/admin/generos')->with('success', 'Género eliminado.');
    }
}
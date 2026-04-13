<?php

namespace App\Controllers;

use App\Models\PlanesModel;

class Planes extends BaseController
{
    public function index()
    {
        $model = new PlanesModel();
        
        $data = [
            'titulo' => 'Gestión de Planes y Suscripciones',
            'planes' => $model->findAll()
        ];

        return view('admin/planes/index', $data);
    }

    public function guardar()
    {
        $model = new PlanesModel();

        // Recolectamos los datos siguiendo tu estructura de Allowed Fields
        $data = [
            'nombre_plan'          => $this->request->getPost('nombre_plan'),
            'precio_plan'          => $this->request->getPost('precio_plan'),
            'cantidad_limite_plan' => $this->request->getPost('cantidad_limite_plan'),
            'tipo_plan'            => $this->request->getPost('tipo_plan'), // Aquí irá "Básico (1 mes)", etc.
            'estatus_plan'         => 1 // 1 para Activo, 0 para Inactivo
        ];

        if ($model->insert($data)) {
            return redirect()->to('/admin/planes')->with('success', 'Plan registrado correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se pudo guardar el plan.');
        }
    }

    public function eliminar($id)
    {
        $model = new PlanesModel();
        $model->delete($id);
        return redirect()->to('/admin/planes')->with('success', 'Plan eliminado.');
    }
}
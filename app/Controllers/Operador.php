<?php

namespace App\Controllers;

// Importamos los modelos para usarlos en la función de aprobar
use App\Models\PagosModel;
use App\Models\UsuariosModel;

class Operador extends BaseController
{
    public function validar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pagos p');
        
        // Seleccionamos los nombres exactos de tu tabla (como los tienes en la imagen)
        $builder->select('p.id_pago, p.monto_pago, p.fecha_registro_pago, p.tarjeta_pago, u.nombre_usuario, pl.nombre_plan');
        $builder->join('usuarios u', 'p.id_usuario = u.id_usuario');
        $builder->join('planes pl', 'p.id_plan = pl.id_plan');
        
        // REGLA: Si en tu DB el estatus pendiente es -1, cámbialo aquí
        $builder->where('p.estatus_pago', 0); 

        $data = [
            'titulo' => 'Validación de Pagos',
            'pagos'  => $builder->get()->getResultArray()
        ];

        return view('operador/validar', $data);
    }

    public function aprobar($id_pago)
    {
        $pagosModel = new PagosModel();
        $usuariosModel = new UsuariosModel();

        // 1. Buscamos el pago
        $pago = $pagosModel->find($id_pago);

        if ($pago) {
            // 2. Cambiamos el estatus del pago a 1 (Aprobado)
            $pagosModel->update($id_pago, ['estatus_pago' => 1]);

            // 3. Le activamos el plan al usuario
            $usuariosModel->update($pago['id_usuario'], [
                'id_plan'         => $pago['id_plan'],
                'estatus_usuario' => 1 // Usuario Activo
            ]);

            return redirect()->to('/operador/validar')->with('success', 'Pago aprobado y plan activado.');
        }

        return redirect()->to('/operador/validar')->with('error', 'No se encontró el registro.');
    }
}
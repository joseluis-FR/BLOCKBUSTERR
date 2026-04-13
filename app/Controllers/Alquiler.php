<?php
namespace App\Controllers;
use App\Models\AlquileresModel;
use App\Models\UsuariosModel;
use CodeIgniter\I18n\Time; // Para manejo de fechas

class Alquiler extends BaseController {

    public function procesar($id_streaming) {
        $session = session();
        $id_usuario = $session->get('id_usuario');
        $db = \Config\Database::connect();

        // 1. VALIDAR LÍMITE DEL PLAN
        // Buscamos cuántas rentas permite el plan del usuario y cuántas lleva
        $builder = $db->table('usuarios_planes up');
        $builder->select('p.cantidad_limite_plan');
        $builder->join('planes p', 'up.id_plan = p.id_plan');
        $builder->where('up.id_usuario', $id_usuario);
        $plan = $builder->get()->getRow();

        $alquilerModel = new AlquileresModel();
        $rentasActivas = $alquilerModel->where('id_usuario', $id_usuario)
                                      ->where('estatus_alquiler', -1) // -1 es "En proceso"
                                      ->countAllResults();

        if ($rentasActivas >= $plan->cantidad_limite_plan) {
            return redirect()->back()->with('msg', 'Límite de plan alcanzado.');
        }

        // 2. CALCULAR FECHA DE VENCIMIENTO (Regla de 5 días)
        $hoy = Time::now('America/Mexico_City');
        $vencimiento = $hoy->addDays(5);

        // 3. GUARDAR RENTA
        $data = [
            'fecha_inicio_alquiler' => $hoy->toDateString(),
            'fecha_fin_alquiler'    => $vencimiento->toDateString(),
            'estatus_alquiler'      => -1,
            'id_streaming'          => $id_streaming,
            'id_usuario'            => $id_usuario
        ];

        $alquilerModel->insert($data);

        return redirect()->to('/cliente/dashboard')->with('success', 'Renta exitosa. Tienes 5 días.');
    }
}
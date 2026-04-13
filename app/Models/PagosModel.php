<?php
namespace App\Models;
use CodeIgniter\Model;

class PagosModel extends Model {
    protected $table      = 'pagos';
    protected $primaryKey = 'id_pago';
    protected $returnType = 'array';
    protected $allowedFields = ['fecha_registro_pago', 'estatus_pago', 'monto_pago', 'tarjeta_pago', 'id_usuario', 'id_plan'];
}
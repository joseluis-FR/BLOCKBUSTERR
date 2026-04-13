<?php
namespace App\Models;
use CodeIgniter\Model;

class PlanesModel extends Model {
    protected $table      = 'planes';
    protected $primaryKey = 'id_plan';
    protected $returnType = 'array';
    protected $allowedFields = ['estatus_plan', 'nombre_plan', 'precio_plan', 'cantidad_limite_plan', 'tipo_plan'];
}
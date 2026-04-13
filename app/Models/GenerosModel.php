<?php
namespace App\Models;
use CodeIgniter\Model;

class GenerosModel extends Model {
    protected $table      = 'generos';
    protected $primaryKey = 'id_genero';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre_genero'];
}
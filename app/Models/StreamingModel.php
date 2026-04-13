<?php
namespace App\Models;
use CodeIgniter\Model;

class StreamingModel extends Model {
    protected $table      = 'streaming';
    protected $primaryKey = 'id_streaming';
    protected $returnType = 'array';
    protected $allowedFields = [
        'tipo_streaming', 'nombre_streaming', 'caratula_streaming', 
        'trailer_streaming', 'clasificacion_streaming', 'descripcion_streaming', 
        'duracion_streaming', 'temporadas_streaming', 'id_genero'
    ];
}
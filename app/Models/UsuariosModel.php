<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nombre_usuario', 'correo_usuario', 'password_usuario', 
        'id_rol', 'id_plan', 'estatus_usuario'
    ];
}
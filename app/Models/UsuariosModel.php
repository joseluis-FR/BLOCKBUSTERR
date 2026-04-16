<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'array';
    protected $allowedFields = [
    'nombre_usuario', 'ap_usuario', 'am_usuario', 'sexo_usuario', 
    'email_usuario', 'password_usuario', 'id_rol', 'estatus_usuario'
];
}
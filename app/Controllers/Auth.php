<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function procesar()
    {
        $session = session();
        $model = new UsuariosModel();

        $correo = $this->request->getPost('correo');
        $passwordPlano = $this->request->getPost('password');

        // 1. Cifrar la contraseña recibida para que coincida con el formato de la BD (SHA256)
        $passwordHash = hash('sha256', $passwordPlano);

        // 2. Ajustar el nombre de la columna a 'email_usuario' como está definida en la tabla
        $usuario = $model->where('email_usuario', $correo)->first();

        if ($usuario) {
            // Comparamos el hash generado con el almacenado
            if ($passwordHash == $usuario['password_usuario']) {
                
                $sesionData = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre'     => $usuario['nombre_usuario'],
                    'id_rol'     => $usuario['id_rol'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($sesionData);
                
                // Redirección por roles
                if ($usuario['id_rol'] == 745) {
                    return redirect()->to('/admin/dashboard');
                } elseif ($usuario['id_rol'] == 125) {
                    return redirect()->to('/operador/dashboard');
                } elseif ($usuario['id_rol'] == 58) {
                    return redirect()->to('/cliente/dashboard');
                } else {
                    return redirect()->to('/salir');
                }

            } else {
                return redirect()->back()->with('msg', 'Contraseña incorrecta.');
            }
        } else {
            return redirect()->back()->with('msg', 'El correo no existe.');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
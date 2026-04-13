<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si la variable 'isLoggedIn' no existe en la sesión, redirigir al login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('msg', 'Debes iniciar sesión primero.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita hacer nada después
    }
}
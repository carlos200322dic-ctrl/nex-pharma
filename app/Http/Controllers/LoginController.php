<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('Login');
    }

    public function showRegister()
    {
        return view('Register');
    }

    public function login(Request $request)
    {
        // validar credenciales
    }

    public function register(Request $request)
    {
        // crear usuario
    }

    public function logout()
    {
        // cerrar sesión
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importar el modelo User
use Illuminate\Support\Facades\Auth; // Importar la fachada Auth
use Illuminate\Support\Facades\Hash; // Importar Hash para encriptar contraseñas

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login'); // Asegúrate que tu archivo se llame Login.blade.php
    }

    public function showRegister()
    {
        return view('register'); // Asegúrate que tu archivo se llame Register.blade.php
    }

    public function login(Request $request)
    {
        // 1. Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intentar iniciar sesión
        // El método attempt busca el email y compara la contraseña usando Hash automáticamente
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Seguridad contra fijación de sesiones

            return redirect()->intended('/panel'); // Redirige al panel privado
        }

        // 3. Si falla, regresar con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        // 1. Validar los datos de registro
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        // 2. Crear el usuario en la base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ¡Siempre encriptada!
        ]);

        // 3. Iniciar sesión automáticamente al registrarse
        Auth::login($user);

        return redirect('/panel');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Regenerar token CSRF

        return redirect('/login');
    }
}
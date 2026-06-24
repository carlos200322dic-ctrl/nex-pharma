<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar vista de Login
    public function showLogin()
    {
        return view('login');
    }

    // Mostrar vista de Registro
    public function showRegister()
    {
        return view('register');
    }

    // Procesar Inicio de Sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/panel'); // Redirige al panel si es exitoso
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Procesar Registro
    public function register(Request $request)
    {
        // 1. Validamos los datos (el confirmed verifica que password y password_confirmation sean iguales)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);

        // 2. Creamos el usuario en la BD (encriptando la contraseña)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Autenticamos automáticamente al usuario recién registrado
        Auth::login($user);

        // 4. Lo enviamos al panel de administración
        return redirect('/panel');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}
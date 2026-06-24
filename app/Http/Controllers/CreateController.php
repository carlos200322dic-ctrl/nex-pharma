<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CreateControler extends Controller
{
    // Muestra el formulario
    public function create()
    {
        return view('productos_create');
    }

    // Guarda el producto en la BD
    public function store(Request $request)
    {
        // 1. Validar los datos recibidos
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'laboratorio'  => 'nullable|string|max:255',
            'categoria'    => 'nullable|string|max:255',
            'stock_actual' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        // 2. Crear el registro
        Producto::create($request->all());

        // 3. Redirigir al listado con un mensaje de éxito
        return redirect('/productos')->with('success', 'Producto registrado exitosamente.');
    }
}
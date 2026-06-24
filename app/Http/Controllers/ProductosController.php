<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        // Obtenemos los productos reales de la base de datos
        $productos = Producto::all();
        
        return view('productos', compact('productos'));
    }

    public function create()
        {
            // Cambiamos 'productos.create' (que busca en carpeta) 
            // por 'productos_create' (que busca un archivo en la raíz de views)
            return view('productos_create'); 
        
    }

    public function store(Request $request)
    {
        // Lógica para guardar el nuevo producto
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
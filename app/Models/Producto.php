<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Definimos qué campos se pueden llenar masivamente
    // Asegúrate de incluir todos los nombres de columnas que tienes en tu migración
    protected $fillable = [
        'nombre',
        'laboratorio',
        'categoria',
        'stock_actual',
        'stock_minimo',
        'precio_venta',
    ];

    // Si tu tabla en la base de datos se llama exactamente 'productos', 
    // no hace falta especificarla, Laravel lo detecta automáticamente.
}
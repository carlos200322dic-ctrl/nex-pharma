<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - Nex Pharma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fondo-azul-corporativo { background-color: #0A3D8F; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto px-6 py-8 max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Registrar Nuevo Producto</h1>

            <form action="{{ url('/productos') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nombre del Medicamento</label>
                    <input type="text" name="nombre" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Laboratorio -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Laboratorio</label>
                        <input type="text" name="laboratorio" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <!-- Categoría -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Categoría</label>
                        <input type="text" name="categoria" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Stock -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Stock Inicial</label>
                        <input type="number" name="stock_actual" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                    <!-- Precio -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Precio de Venta</label>
                        <input type="number" step="0.01" name="precio_venta" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition">Guardar Producto</button>
                    <a href="{{ url('/productos') }}" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium transition">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel General - Nex Pharma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fondo-azul-corporativo { background-color: #0A3D8F; }
        .texto-azul-corporativo { color: #0A3D8F; }
        .fondo-verde-marca { background-color: #00B39D; }
        .texto-verde-marca { color: #00B39D; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased min-h-screen flex flex-col">

    <!-- NAVEGACIÓN PRINCIPAL -->
    <nav class="fondo-azul-corporativo text-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/icono.png') }}" alt="Nex Pharma" class="h-8 w-8 object-contain filter brightness-0 invert">
                <span class="text-xl font-bold tracking-wider">NEX PHARMA</span>
            </div>
            <div class="hidden md:flex space-x-6 text-sm font-medium">
                <a href="{{ url('/panel') }}" class="text-white border-b-2 border-white pb-1">Panel General</a>
                <a href="{{ url('/productos') }}" class="text-blue-200 hover:text-white pb-1 transition-colors">Productos</a>
                <a href="{{ url('/ventas') }}" class="text-blue-200 hover:text-white pb-1 transition-colors">Ventas</a>
                <a href="{{ url('/reportes') }}" class="text-blue-200 hover:text-white pb-1 transition-colors">Reportes</a>
            </div>
            <div>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-medium shadow-sm transition-colors">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow container mx-auto px-6 py-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Panel General</h1>
            <p class="text-gray-500">Resumen del sistema y estado actual del inventario de tu farmacia.</p>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS (KPIs) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <!-- Ventas Totales -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                <div class="w-14 h-14 rounded-full fondo-verde-marca bg-opacity-20 flex items-center justify-center texto-verde-marca">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium">Ventas Totales (Hoy)</p>
                    <h3 class="text-2xl font-bold text-gray-800">${{ number_format($totalVentas ?? 0, 2) }}</h3>
                </div>
            </div>

            <!-- Total de Productos -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center texto-azul-corporativo">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium">Productos en Catálogo</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalProductos ?? 0 }}</h3>
                </div>
            </div>

            <!-- Alertas de Stock -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium">Alertas de Stock Bajo</p>
                    <h3 class="text-2xl font-bold text-red-600">{{ $cantidadAlertas ?? 0 }}</h3>
                </div>
            </div>

        </div>

        <!-- TABLA: PRODUCTOS CON STOCK BAJO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Medicamentos por Agotarse</h3>
                <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full">Atención Requerida</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-white border-b text-gray-500 font-medium">
                        <tr>
                            <th class="px-6 py-3">Nombre del Producto</th>
                            <th class="px-6 py-3">Laboratorio</th>
                            <th class="px-6 py-3 text-center">Stock Actual</th>
                            <th class="px-6 py-3 text-center">Stock Mínimo Permitido</th>
                            <th class="px-6 py-3 text-right">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productosBajos ?? [] as $producto)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $producto->nombre }}</td>
                            <td class="px-6 py-4">{{ $producto->laboratorio ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-600 font-black bg-red-50 px-2 py-1 rounded">{{ $producto->stock_actual }}</span>
                            </td>
                            <td class="px-6 py-4 text-center text-gray-500">{{ $producto->stock_minimo }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Abastecer</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center">
                                <div class="inline-block p-4 rounded-full bg-green-50 mb-2">
                                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <p class="text-gray-500 font-medium">Todo en orden. Ningún producto está por debajo del stock mínimo.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Nex Pharma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fondo-azul-corporativo { background-color: #0A3D8F; }
        .texto-azul-corporativo { color: #0A3D8F; }
        .fondo-verde-marca { background-color: #00B39D; }
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
                <a href="{{ url('/panel') }}" class="text-blue-200 hover:text-white pb-1 transition-colors">Panel General</a>
                <a href="{{ url('/productos') }}" class="text-white border-b-2 border-white pb-1">Productos</a>
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
        
        <!-- Cabecera de la sección -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Catálogo de Productos</h1>
                <p class="text-gray-500">Gestiona los medicamentos, laboratorios y precios.</p>
            </div>
            <div>
                <!-- Botón para crear un nuevo producto -->
                <a href="{{ url('/productos/create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium shadow-sm transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Nuevo Producto
                </a>
            </div>
        </div>

        <!-- TABLA PRINCIPAL DE PRODUCTOS -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <!-- Buscador interno visual -->
            <div class="p-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                <div class="relative w-full max-w-md">
                    <input type="text" placeholder="Buscar por nombre o laboratorio..." class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm shadow-sm">
                    <div class="absolute left-3 top-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-white border-b text-gray-500 font-medium">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nombre del Medicamento</th>
                            <th class="px-6 py-4">Lab. / Categoría</th>
                            <th class="px-6 py-4 text-center">Stock</th>
                            <th class="px-6 py-4 text-right">Precio Venta</th>
                            <th class="px-6 py-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Bucle Foreach para listar productos -->
                        @forelse($productos ?? [] as $producto)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400 font-mono text-xs">#{{ str_pad($producto->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $producto->nombre }}</td>
                            <td class="px-6 py-4">
                                <div class="text-gray-800 font-medium">{{ $producto->laboratorio ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $producto->categoria ?? 'Sin categorizar' }}</div>
                            </td>
                            
                            <!-- Lógica visual de Stock -->
                            <td class="px-6 py-4 text-center">
                                @if($producto->stock_actual <= $producto->stock_minimo)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        {{ $producto->stock_actual }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                        {{ $producto->stock_actual }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-right font-black text-gray-900">
                                ${{ number_format($producto->precio_venta, 2) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-4">
                                    <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="text-blue-500 hover:text-blue-700 transition" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ url('/productos/'.$producto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este medicamento del catálogo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gray-100 p-4 rounded-full mb-4">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                    <p class="text-lg font-medium text-gray-700">Inventario Vacío</p>
                                    <p class="text-sm mt-1">Aún no has registrado ningún producto. Haz clic en "Nuevo Producto" para empezar.</p>
                                </div>
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
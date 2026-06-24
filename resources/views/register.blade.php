<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Nex Pharma</title>
    <!-- Cargamos Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* --- COLORES CORPORATIVOS --- */
        .fondo-azul-oscuro-corporativo { background-color: #0A3D8F; }
        .texto-azul-oscuro-corporativo { color: #0A3D8F; }
        .fondo-inputs-claros { background-color: #F8F9FA; }
        
        /* --- BANNER LATERAL CON IMAGEN DE FONDO --- */
        .fondo-lateral-imagen {
            background: linear-gradient(rgba(10, 61, 143, 0.9), rgba(0, 119, 204, 0.85)), url('{{ asset("images/background-pills.jpg") }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-white min-h-screen font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- COLUMNA IZQUIERDA: FORMULARIO -->
        <main class="w-full md:w-1/2 flex flex-col justify-between p-8 md:p-16 lg:p-24 bg-white">
            
            <!-- Enlace para regresar -->
            <div class="mb-6">
                <a href="{{ url('/login') }}" class="text-sm font-medium text-blue-700 hover:underline">
                    ← Volver al Login
                </a>
            </div>

            <!-- Contenedor del Formulario -->
            <div class="w-full max-w-md mx-auto my-auto space-y-6">
                
                <!-- Identidad de Marca -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icono.png') }}" alt="Nex Pharma" class="h-12 w-12 object-contain">
                    <div>
                        <h1 class="text-2xl font-bold texto-azul-oscuro-corporativo leading-none">Nex Pharma</h1>
                        <p class="text-xs text-gray-500 mt-1">Sistema de Gestión Farmacéutica</p>
                    </div>
                </div>

                <!-- Títulos -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Crear Cuenta</h2>
                    <p class="text-sm text-gray-500 mt-1">Registra tus datos para acceder al sistema de inventario</p>
                </div>

                <!-- Formulario -->
                <form action="{{ url('/register') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Nombre Completo -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nombre Completo</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Ej: Carlos Juárez"
                               class="w-full px-4 py-2 fondo-inputs-claros border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                               required autofocus>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Correo Electrónico -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="usuario@ejemplo.com"
                               class="w-full px-4 py-2 fondo-inputs-claros border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                               required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Mínimo 8 caracteres"
                               class="w-full px-4 py-2 fondo-inputs-claros border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                               required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Repite tu contraseña"
                               class="w-full px-4 py-2 fondo-inputs-claros border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                               required>
                    </div>

                    <!-- Botón de Registro -->
                    <div class="pt-4">
                        <button type="submit" class="w-full py-2.5 fondo-azul-oscuro-corporativo hover:bg-blue-800 text-white font-medium rounded-lg text-sm transition-colors cursor-pointer shadow-md">
                            Registrarse en el Sistema
                        </button>
                    </div>
                </form>

            </div>

            <!-- Espaciador inferior -->
            <div class="mt-6"></div>

        </main>

        <!-- COLUMNA DERECHA: BANNER INFORMATIVO -->
        <section class="hidden md:flex md:w-1/2 fondo-lateral-imagen text-white p-12 lg:p-24 flex-col justify-center space-y-8 shadow-inner">
            
            <div class="max-w-md space-y-2">
                <h2 class="text-3xl lg:text-4xl font-bold">Bienvenido a Nex Pharma</h2>
                <p class="text-blue-100 text-sm font-light">
                    La plataforma integral para la gestión moderna de tu farmacia
                </p>
            </div>

            <!-- Lista de Características -->
            <div class="space-y-4 max-w-md">
                
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Control Total de Inventario</h3>
                        <p class="text-xs text-blue-100/80">Gestiona tu stock en tiempo real con alertas inteligentes.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Ventas Integradas</h3>
                        <p class="text-xs text-blue-100/80">Procesa las ventas y descuenta productos automáticamente.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Seguridad Garantizada</h3>
                        <p class="text-xs text-blue-100/80">Tus datos protegidos con encriptación de nivel empresarial.</p>
                    </div>
                </div>

            </div>
        </section>

    </div>

</body>
</html>
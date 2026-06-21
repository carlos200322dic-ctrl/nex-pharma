<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Nex Pharma</title>
    <!-- Cargamos Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <style>
        /* --- COLORES CORPORATIVOS --- */
        .bg-nex-blue-dark { 
            background-color: #0A3D8F; 
        }
        .text-nex-blue-dark { 
            color: #0A3D8F; 
        }
        .bg-nex-input { 
            background-color: #F8F9FA; 
        }
        
        /* --- BANNER LATERAL CON IMAGEN DE FONDO --- */
        .bg-login-pills {
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
                <a href="{{ url('/') }}" class="text-sm font-medium text-blue-700 hover:underline">
                    ← Volver al inicio
                </a>
            </div>

            <!-- Contenedor del Formulario -->
            <div class="w-full max-w-md mx-auto my-auto space-y-6">
                
                <!-- Identidad de Marca con icono.png -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icono.png') }}" alt="Nex Pharma" class="h-12 w-12 object-contain">
                    <div>
                        <h1 class="text-2xl font-bold text-nex-blue-dark leading-none">Nex Pharma</h1>
                        <p class="text-xs text-gray-500 mt-1">Sistema de Gestión Farmacéutica</p>
                    </div>
                </div>

                <!-- Títulos -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Iniciar Sesión</h2>
                    <p class="text-sm text-gray-500 mt-1">Ingresa tus credenciales para acceder al sistema</p>
                </div>

                <!-- Formulario -->
                <form action="{{ url('/login') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Correo Electrónico -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="usuario@ejemplo.com"
                               class="w-full px-4 py-2 bg-nex-input border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
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
                               placeholder="••••••••"
                               class="w-full px-4 py-2 bg-nex-input border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                               required>
                    </div>

                    <!-- Recordarme & Olvidaste contraseña -->
                    <div class="flex items-center justify-between text-sm pt-1">
                        <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            Recordarme
                        </label>
                        <a href="#" class="text-blue-700 hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>

                    <!-- Botón de Ingreso -->
                    <div class="pt-2">
                        <button type="submit" class="w-full py-2.5 bg-nex-blue-dark hover:bg-blue-800 text-white font-medium rounded-lg text-sm transition-colors cursor-pointer">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

                <!-- Crear una Cuenta -->
                <div class="text-center text-sm text-gray-600 pt-2">
                    ¿No tienes una cuenta? <a href="{{ url('/register') }}" class="text-blue-700 font-semibold hover:underline">Crear una cuenta</a>
                </div>

            </div>

            <!-- Espaciador inferior -->
            <div class="mt-6"></div>

        </main>

        <!-- COLUMNA DERECHA: BANNER INFORMATIVO -->
        <section class="hidden md:flex md:w-1/2 bg-login-pills text-white p-12 lg:p-24 flex-col justify-center space-y-8">
            
            <div class="max-w-md space-y-2">
                <h2 class="text-3xl lg:text-4xl font-bold">Bienvenido a Nex Pharma</h2>
                <p class="text-blue-100 text-sm font-light">
                    La plataforma integral para la gestión moderna de tu farmacia
                </p>
            </div>

            <!-- Lista de Características -->
            <div class="space-y-4 max-w-md">
                
                <!-- Item 1 -->
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Control Total de Inventario</h3>
                        <p class="text-xs text-blue-100/80">Gestiona tu stock en tiempo real con alertas inteligentes</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Reportes Automáticos</h3>
                        <p class="text-xs text-blue-100/80">Análisis detallados y gráficos en tiempo real</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-teal-400/20 text-teal-300 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Seguridad Garantizada</h3>
                        <p class="text-xs text-blue-100/80">Tus datos protegidos con encriptación de nivel empresarial</p>
                    </div>
                </div>

            </div>

        </section>

    </div>

</body>
</html>
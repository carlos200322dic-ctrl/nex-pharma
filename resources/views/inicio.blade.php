<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nex Pharma - Sistema de Gestión Farmacéutica</title>
    <!-- Cargamos Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <style>
        /* --- COLORES CORPORATIVOS EN ESPAÑOL --- */
        .texto-azul-oscuro-corporativo { color: #0A3D8F; }
        .fondo-azul-oscuro-corporativo { background-color: #0A3D8F; }
        .fondo-azul-claro-secundario { background-color: #0077CC; }
        .texto-verde-destacados { color: #00B39D; }
        .fondo-verde-marca { background-color: #00B39D; }
        .borde-verde-indicador { border-color: #00B39D; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased">

    {{-- Incluimos tu Header Configurado --}}
    @include('partials.header')

    <!-- SECCIÓN PRINCIPAL (HERO) -->
    <main class="flex-grow">
        
        <!-- BIENVENIDA -->
        <section class="container mx-auto px-6 py-20 text-center max-w-4xl space-y-6">
            <span class="px-4 py-1.5 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full uppercase tracking-wider">
                Software de Gestión de Inventario
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight leading-tight texto-azul-oscuro-corporativo">
                La plataforma integral para la gestión moderna de tu farmacia
            </h2>
            <p class="text-gray-600 text-lg md:text-xl font-light max-w-2xl mx-auto leading-relaxed">
                Optimiza tus operaciones diarias, controla existencias en tiempo real y toma decisiones basadas en reportes precisos con <strong>Nex Pharma</strong>.
            </p>
            <div class="pt-4">
                <a href="{{ url('/login') }}" class="px-8 py-3.5 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all inline-block transform hover:-translate-y-0.5 cursor-pointer fondo-azul-oscuro-corporativo hover:bg-blue-800">
                    Acceder al Sistema →
                </a>
            </div>
        </section>

        <!-- SECCIÓN: QUIÉNES SOMOS & QUÉ HACEMOS -->
        <section class="bg-white border-t border-b border-gray-100 py-16">
            <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 max-w-5xl">
                
                <!-- Quiénes Somos -->
                <div class="space-y-3 border-l-4 pl-5 borde-verde-indicador">
                    <h3 class="text-2xl font-bold texto-azul-oscuro-corporativo">¿Quiénes Somos?</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        Somos una solución tecnológica especializada diseñada para resolver los desafíos logísticos y de inventario dentro del sector farmacéutico. Nos enfocamos en ofrecer herramientas robustas, intuitivas y eficientes para garantizar el abastecimiento correcto de medicamentos.
                    </p>
                </div>

                <!-- Qué Hacemos -->
                <div class="space-y-3 border-l-4 pl-5 borde-verde-indicador">
                    <h3 class="text-2xl font-bold texto-azul-oscuro-corporativo">¿Qué Hacemos?</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        Transformamos la administración manual en procesos automatizados. Con Nex Pharma puedes registrar productos farmacéuticos, monitorear lotes próximos a vencer, generar reportes automáticos de ventas y administrar los flujos de stock con seguridad garantizada a nivel empresarial.
                    </p>
                </div>

            </div>
        </section>

        <!-- SECCIÓN CARACTERÍSTICAS -->
        <section class="bg-gray-50 py-20 border-b border-gray-100">
            <div class="container mx-auto px-6 max-w-6xl">
                
                <div class="text-center space-y-3 mb-16">
                    <h2 class="text-3xl font-bold texto-azul-oscuro-corporativo">Qué Hacemos</h2>
                    <div class="w-16 h-1 mx-auto rounded-full fondo-verde-marca"></div>
                    <p class="text-gray-500 text-sm md:text-base">Una plataforma completa con todas las herramientas que necesitas para gestionar tu farmacia</p>
                </div>

                <!-- Grid de Tarjetas (Simplificadas a 6 para tu BD) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Tarjeta 1: Gestión de Inventario -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="texto-azul-oscuro-corporativo">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Gestión de Inventario</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Control completo de tu stock con sincronización automática en cada venta.</p>
                    </div>

                    <!-- Tarjeta 2: Control de Medicamentos -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="text-blue-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0h-15zM12 4.5v15"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Control de Medicamentos</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Registro detallado incluyendo nombre, categoría y precios exactos.</p>
                    </div>

                    <!-- Tarjeta 3: Control de Laboratorios -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="texto-verde-destacados">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Control de Laboratorios</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Filtra y organiza tus medicamentos por marcas y laboratorios (Ej: Bayer, MK).</p>
                    </div>

                    <!-- Tarjeta 4: Alertas de Stock -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="text-red-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Alertas de Stock</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Avisos visuales cuando los productos alcanzan su nivel de stock mínimo.</p>
                    </div>

                    <!-- Tarjeta 5: Ventas Rápidas -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="text-cyan-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Ventas Integradas</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Punto de venta fluido para facturar los medicamentos a tus clientes.</p>
                    </div>

                    <!-- Tarjeta 6: Panel General -->
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 space-y-3 hover:shadow-md transition-shadow">
                        <div class="text-emerald-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Panel General (Dashboard)</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Monitorea el estado global de tu negocio desde un resumen centralizado.</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECCIÓN TESTIMONIOS -->
        <section class="bg-white py-20">
            <div class="container mx-auto px-6 max-w-5xl">
                
                <div class="text-center space-y-3 mb-16">
                    <h2 class="text-3xl font-bold texto-azul-oscuro-corporativo">Lo que opinan nuestros clientes</h2>
                    <div class="w-16 h-1 mx-auto rounded-full fondo-verde-marca"></div>
                    <p class="text-gray-500 text-sm md:text-base">Historias de éxito de farmacias que automatizaron su control</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonio 1 -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 flex flex-col justify-between">
                        <p class="text-gray-600 text-sm italic leading-relaxed">
                            "Antes perdíamos mucho dinero porque no sabíamos qué productos se estaban agotando. Las alertas de stock de Nex Pharma solucionaron esto de inmediato."
                        </p>
                        <div class="mt-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm fondo-azul-oscuro-corporativo">DF</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-900">Dra. Elena Fuentes</h5>
                                <p class="text-xs text-gray-400">Farmacia San Rafael</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 2 -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 flex flex-col justify-between">
                        <p class="text-gray-600 text-sm italic leading-relaxed">
                            "El módulo de ventas es increíblemente veloz. Atendemos a los pacientes en la mitad de tiempo y el inventario se descuenta de forma exacta en tiempo real."
                        </p>
                        <div class="mt-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm fondo-verde-marca">MC</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-900">Lic. Manuel Mendoza</h5>
                                <p class="text-xs text-gray-400">FarmaSalud Center</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 3 -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 flex flex-col justify-between">
                        <p class="text-gray-600 text-sm italic leading-relaxed">
                            "El panel general me da la tranquilidad de ver exactamente cuánto hemos vendido en el día con un solo vistazo. Todo está organizado."
                        </p>
                        <div class="mt-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-sm">GA</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-900">Gerardo Alvarado</h5>
                                <p class="text-xs text-gray-400">Cadena de Farmacias El Alivio</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
        <div class="container mx-auto px-6 max-w-5xl text-center space-y-4">
            <p class="text-white font-bold text-lg">Nex Pharma</p>
            <p class="text-xs max-w-md mx-auto">Soluciones tecnológicas avanzadas diseñadas para el control operativo de inventarios, laboratorios y ventas de farmacias.</p>
            <div class="text-xs pt-4 border-t border-gray-800 text-gray-500">
                &copy; {{ date('Y') }} Nex Pharma - Sistema de Gestión Farmacéutica. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</body>
</html>
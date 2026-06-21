<header class="w-full bg-white shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        {{-- INICIO --}}
        @if (Request::is('/'))

            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Nex Pharma" class="h-10">
            </div>

            <div>
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Iniciar Sesión
                </a>
            </div>

        {{-- LOGIN --}}
        @elseif (Request::is('login'))

            <div class="w-full flex items-center">

                <div class="flex-1">
                    <a href="{{ url('/') }}"
                       class="text-blue-600 font-medium">
                        ← Atrás
                    </a>
                </div>

                <div class="flex-1 flex justify-center">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Nex Pharma"
                         class="h-10">
                </div>

                <div class="flex-1"></div>

            </div>

        @endif

    </div>
</header>
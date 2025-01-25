<nav class="bg-green-800 py-6 relative">
    <div class="container mx-auto flex px-8 xl:px-0">
        {{-- Logo con enlace al inicio --}}
        <div class="flex flex-grow">
            <a href="{{ route('inicio') }}" class="flex items-center">
                <img
                    src="{{ asset('assets/imagenes/logo.png') }}"
                    alt="logo animal"
                    class="h-20 w-auto rounded-md transition-opacity duration-300 ease-in-out hover:opacity-80"
                >
            </a>
        </div>
        <div class="flew lg:hidden">
            <img src="{{ asset('assets/imagenes/iconoMenu.png') }}" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu" class="hidden flex-grow w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0 lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="{{ route('inicio') }}" class="text-lg font-semibold text-white bg-green-600 py-1 px-4 rounded-lg shadow-lg mb-4 lg:mb-0 lg:mr-4 transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Inicio
                </a>
                <a href="{{ route('animales.index') }}" class="text-lg font-semibold text-white bg-green-600 py-1 px-4 rounded-lg shadow-lg mb-4 lg:mb-0 lg:mr-4 transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Listado de Animales
                </a>
                <a href="{{ route('animales.create') }}" class="text-lg font-semibold text-white bg-green-600 py-1 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Nuevo Animal
                </a>
            </div>
            <div class="flex flex-col items-center lg:flex-row lg:items-center">
                @if (Auth::check())
                    {{-- Nombre de usuario y botón de cerrar sesión mejorados --}}
                    <div class="flex items-center mb-4 lg:mb-0">
                        <span class="text-lg font-semibold text-white mr-4">Hola, {{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}"
                           class="text-lg font-semibold text-white bg-red-600 py-1 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-red-500 hover:shadow-xl"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                    </div>
                    {{-- Formulario para cerrar sesión --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    {{-- Si el usuario no está autenticado, mostramos los botones de login y register --}}
                    <div class="flex items-center mb-4 lg:mb-0">
                        <a href="{{ route('login') }}" class="text-lg font-semibold text-green-800 bg-white py-1 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-700 hover:text-white hover:shadow-xl mr-4">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="text-lg font-semibold text-white bg-green-600 py-1 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                            Regístrate
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    function openMenu() {
        let menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }
</script>

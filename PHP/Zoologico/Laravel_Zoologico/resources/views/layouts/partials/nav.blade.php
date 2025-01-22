<nav class="bg-green-800 py-6 relative">
    <div class="container mx-auto flex px-8 xl:px-0">
        {{-- Logo con enlace al inicio --}}
        <div class="flex flex-grow">
            <a href="{{ route('inicio') }}" class="flex items-center">
                <img
                    src="{{ asset('assets/imagenes/logo.png') }}"
                    alt="logo animal"
                    class="h-20 w-auto transition-transform duration-300 ease-in-out transform hover:scale-110 hover:rotate-6"
                >
            </a>
        </div>
        <div class="flew lg:hidden">
            <img src="{{ asset('assets/imagenes/iconoMenu.png') }}" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu" class="hidden flex-grow w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0 lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="{{ route('inicio') }}" class="text-xl font-semibold text-white bg-green-600 py-2 px-6 rounded-lg shadow-lg mb-4 lg:mb-0 lg:mr-4 transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Inicio
                </a>
                <a href="{{ route('animales.index') }}" class="text-xl font-semibold text-white bg-green-600 py-2 px-6 rounded-lg shadow-lg mb-4 lg:mb-0 lg:mr-4 transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Listado de Animales
                </a>
                <a href="{{ route('animales.create') }}" class="text-xl font-semibold text-white bg-green-600 py-2 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Nuevo Animal
                </a>
            </div>
            <div class="flex flex-col text-center lg:flex-row">
                <a href="#" class="text-xl font-semibold text-green-800 bg-white py-2 px-6 rounded-lg shadow-lg mb-4 lg:mb-0 lg:mr-4 transition duration-300 ease-in-out hover:bg-green-700 hover:text-white hover:shadow-xl">
                    Iniciar Sesión
                </a>
                <a href="#" class="text-xl font-semibold text-white bg-green-600 py-2 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-500 hover:shadow-xl">
                    Regístrate
                </a>
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

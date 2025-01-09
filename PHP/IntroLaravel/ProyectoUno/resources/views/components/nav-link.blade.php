{{--
¿Qué son las props?
 Se utilizan para la comunicacion entre vistas y clases en laravael.
 Utiles para conseguir felxibilidad en momentos donde necesitas  usar el mismo objeto generico
 por con distinas utilidades
----------------
EJEMPLO
----------------
 Imagina que tienes un componente reutilizable (por ejemplo, un botón o una alerta),
 pero necesitas que este componente sea flexible dependiendo de dónde lo uses.
 Los props son el mecanismo que permite esa flexibilidad:

 <div class="alert alert-{{ $type }}">
    {{ $message }}
</div>

<x-alert type="success" message="Operación realizada con éxito" />
<x-alert type="error" message="Ocurrió un error inesperado" />
--}}

@props(['active' => false])
<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>



{{--
-----------------------------------------------------
EJEMPLO PARA MANEJAR LOS TIPOS DE ATRIBUTOS DEL HTML
-----------------------------------------------------
--}}
{{-- @props(['active' => false, 'type' => 'a']) --}}

{{--Se puede hacer usando etiquetas de php, pero con blade es más corto y sencillo--}}
{{-- @if($type==='a')

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
@else

<button class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</button>
@endif --}}

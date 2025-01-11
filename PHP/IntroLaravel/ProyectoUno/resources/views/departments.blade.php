{{-- Utilizamos el componente layout paras usar como plantilla--}}
<x-layout>
    <x-slot:heading>
        Departments
    </x-slot:heading>
    {{--Usamos el foreach para recorrer todos los registros de nuestra tabla departments en nuestra base de datos--}}
    @foreach ($departments as $department)
        <ul>
            <li>
                {{-- Usamos el ID en el href porque es un identificador único que asegura que siempre se acceda
                al departamento correcto, incluso si hay títulos duplicados o cambios en el futuro. --}}
                <a href="/department/{{$department['id']}}" class="text-black-500 hover:underline hover:text-blue-800">
                    <strong>Department: </strong>{{ $department['title'] }}
                </a>
            </li>
        </ul>
    @endforeach
</x-layout>

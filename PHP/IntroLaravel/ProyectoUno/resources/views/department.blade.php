<x-layout>
    <x:slot:heading>
        Departments Manager
    </x:slot:heading>
    {{-- Sencillamente usamos $department para acceder a las claves y sacar los datos--}}
    <h2 class="font-bold text-lg">{{$department['title']}}</h2>
    <p>
        The manager of this department is <strong>{{$department['manager']}}</strong>
    </p>
</x-layout>

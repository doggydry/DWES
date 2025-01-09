<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    {{-- Usamos blade para recorrer el array de nuestra vista --}}
    @foreach ($jobs as $job)
        <ul>
            <li>
                <a href="/jobs/{{$job['id']}}" class="text-black-500 hover:underline hover:text-blue-800">
                <strong>{{ $job['title'] }}: </strong>Pays {{ $job['salary'] }} per year
                </a>
            </li>
        </ul>
    @endforeach
</x-layout>

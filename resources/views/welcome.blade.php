<x-layout><br><br><br><br>    
    <h1>{{ $greeting }}</h1>
    <p>Name: {{ $name }}</p>
    <p>Age: {{ $age }}</p>

    @if (count($tasks))
        <h2>Tasks</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task }}</li>
            @endforeach
        </ul>
    @endif

    
</x-layout>
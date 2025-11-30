<x-app-layout>
    <div class="max-w-3xl mx-auto mt-6">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Lista ćwiczeń</h2>
            <a href="{{ route('exercises.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                Dodaj ćwiczenie
            </a>
        </div>

        @foreach($exercises as $exercise)
            <div class="p-4 bg-white shadow rounded mb-3">
                <div class="font-semibold">{{ $exercise->name }}</div>
                <div>Ciężar: {{ $exercise->weight ?? '-' }} kg</div>
                <div>Powtórzenia: {{ $exercise->reps ?? '-' }}</div>
                <div class="mt-2 text-sm text-gray-600">{{ $exercise->notes }}</div>

                <div class="mt-3 flex gap-3">
                    <a href="{{ route('exercises.edit', $exercise) }}" class="text-blue-600">Edytuj</a>

                    <form action="{{ route('exercises.destroy', $exercise) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Usuń</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>

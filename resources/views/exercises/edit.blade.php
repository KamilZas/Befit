<x-app-layout>
<div class="max-w-xl mx-auto mt-6">

    <h2 class="text-xl font-bold mb-4">Edytuj ćwiczenie</h2>

    <form method="POST" action="{{ route('exercises.update', $exercise) }}">
        @csrf
        @method('PUT')

        <label>Nazwa</label>
        <input type="text" name="name" class="w-full border p-2 rounded"
            value="{{ $exercise->name }}" required>

        <label class="mt-3 block">Ciężar (kg)</label>
        <input type="number" name="weight" class="w-full border p-2 rounded"
            value="{{ $exercise->weight }}">

        <label class="mt-3 block">Powtórzenia</label>
        <input type="number" name="reps" class="w-full border p-2 rounded"
            value="{{ $exercise->reps }}">

        <label class="mt-3 block">Notatki</label>
        <textarea name="notes" class="w-full border p-2 rounded">{{ $exercise->notes }}</textarea>

        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
            Zapisz zmiany
        </button>
    </form>

</div>
</x-app-layout>

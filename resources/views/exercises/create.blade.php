<x-app-layout>
<div class="max-w-xl mx-auto mt-6">

    <h2 class="text-xl font-bold mb-4">Dodaj ćwiczenie</h2>

    <form method="POST" action="{{ route('exercises.store') }}">
        @csrf

        <label>Nazwa</label>
        <input type="text" name="name" class="w-full border p-2 rounded" required>

        <label class="mt-3 block">Ciężar (kg)</label>
        <input type="number" name="weight" class="w-full border p-2 rounded">

        <label class="mt-3 block">Powtórzenia</label>
        <input type="number" name="reps" class="w-full border p-2 rounded">

        <label class="mt-3 block">Notatki</label>
        <textarea name="notes" class="w-full border p-2 rounded"></textarea>

        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
            Zapisz
        </button>
    </form>

</div>
</x-app-layout>

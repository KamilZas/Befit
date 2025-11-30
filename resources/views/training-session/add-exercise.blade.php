@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Dodaj ćwiczenie do sesji</h2>

    <form method="POST" action="{{ route('training-session.store-exercise', $training_session->id) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Ćwiczenie</label>
            <select name="exercise_type_id" class="form-control" required>
                @foreach($exerciseTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">
                Wybierz ćwiczenie z listy zdefiniowanych typów ćwiczeń.
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Ciężar (kg)</label>
            <input type="number" name="weight" class="form-control" min="0" step="0.5" required>
            <small class="form-text text-muted">
                Podaj użyte obciążenie w kilogramach.
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Liczba serii</label>
            <input type="number" name="sets" class="form-control" min="1" max="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Powtórzenia w serii</label>
            <input type="number" name="reps" class="form-control" min="1" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">
            Zapisz ćwiczenie
        </button>

        <a href="{{ route('training-session.edit', $training_session->id) }}" class="btn btn-secondary ms-2">
            Wróć do sesji
        </a>
    </form>

</div>
@endsection

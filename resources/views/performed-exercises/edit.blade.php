@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Edytuj wykonane ćwiczenie</h2>

    <form method="POST" action="{{ route('performed-exercises.update', $performed_exercise->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Ćwiczenie</label>
            <select name="exercise_type_id" class="form-control" required>
                @foreach($exerciseTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ $performed_exercise->exercise_type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Wybierz typ ćwiczenia z listy.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Ciężar (kg)</label>
            <input type="number" name="weight" class="form-control"
                   value="{{ $performed_exercise->weight }}" min="0" step="0.5" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Liczba serii</label>
            <input type="number" name="sets" class="form-control"
                   value="{{ $performed_exercise->sets }}" min="1" max="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Powtórzenia w serii</label>
            <input type="number" name="reps" class="form-control"
                   value="{{ $performed_exercise->reps }}" min="1" max="200" required>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        <a href="{{ route('training-session.edit', $performed_exercise->training_session_id) }}"
           class="btn btn-secondary ms-2">
            Wróć do sesji
        </a>
    </form>

</div>
@endsection

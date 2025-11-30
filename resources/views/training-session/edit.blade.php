@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Edytuj sesję treningową</h2>

    {{-- Formularz edycji samej sesji --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('training-session.update', $training_session->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Data treningu</label>
                    <input type="date" name="date" value="{{ $training_session->date }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start</label>
                    <input type="time" name="start_time" value="{{ $training_session->start_time }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Koniec</label>
                    <input type="time" name="end_time" value="{{ $training_session->end_time }}" class="form-control">
                </div>

                <button class="btn btn-primary">Zapisz zmiany</button>
            </form>
        </div>
    </div>

    {{-- Sekcja ćwiczeń --}}
    <h3>Wykonane ćwiczenia</h3>

    <a href="{{ route('training-session.add-exercise', $training_session->id) }}" class="btn btn-success mb-3">
        ➕ Dodaj ćwiczenie
    </a>

    @if($training_session->exercises->count())
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Ćwiczenie</th>
                    <th>Ciężar (kg)</th>
                    <th>Serie</th>
                    <th>Powtórzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($training_session->exercises as $ex)
                    <tr>
                        <td>{{ $ex->exerciseType->name }}</td>
                        <td>{{ $ex->weight }}</td>
                        <td>{{ $ex->sets }}</td>
                        <td>{{ $ex->reps }}</td>

                        <td class="d-flex gap-2">

                            {{-- EDYCJA ĆWICZENIA --}}
                            <a href="{{ route('performed-exercises.edit', $ex->id) }}" class="btn btn-warning btn-sm">
                                ✏ Edytuj
                            </a>

                            {{-- USUWANIE ĆWICZENIA --}}
                            <form method="POST" action="{{ route('performed-exercises.destroy', $ex->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Na pewno usunąć ćwiczenie?')" class="btn btn-danger btn-sm">
                                    🗑 Usuń
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Brak ćwiczeń w tej sesji.</p>
    @endif

</div>
@endsection

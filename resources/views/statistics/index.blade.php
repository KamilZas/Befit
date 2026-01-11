@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Statystyki treningów — ostatnie 4 tygodnie</h2>

    @if($sessions->count() === 0)
        <p>Brak treningów z ostatnich 4 tygodni.</p>
    @else
        @foreach($sessions as $session)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $session->date }}</strong> 
                    ({{ $session->start_time }} - {{ $session->end_time ?? '—' }})
                </div>

                <div class="card-body">
                    @if($session->exercises->count())
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Ćwiczenie</th>
                                    <th>Ciężar (kg)</th>
                                    <th>Serie</th>
                                    <th>Powtórzenia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($session->exercises as $ex)
                                    <tr>
                                        <td>{{ $ex->exerciseType->name }}</td>
                                        <td>{{ $ex->weight }}</td>
                                        <td>{{ $ex->sets }}</td>
                                        <td>{{ $ex->reps }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Brak ćwiczeń w tej sesji.</p>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Twoje sesje treningowe</h2>

    <a href="{{ route('training-session.create') }}" class="btn btn-primary mb-3">
        ➕ Dodaj nową sesję
    </a>

    @if($sessions->isEmpty())
        <p>Nie masz jeszcze żadnych sesji.</p>
    @else
        <table class="table table-dark table-striped">
            <tr>
                <th>Start</th>
                <th>Koniec</th>
                <th>Akcje</th>
            </tr>

            @foreach ($sessions as $session)
                <tr>
                    <td>{{ $session->start_time }}</td>
                    <td>{{ $session->end_time }}</td>
                    <td>
                        <a href="{{ route('training-session.edit', $session) }}" class="btn btn-secondary btn-sm">
                            ✏️ Edytuj
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection

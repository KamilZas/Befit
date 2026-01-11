@extends('layouts.app')

@section('content')
    <h1>Typy ćwiczeń</h1>

    @if($exerciseTypes->isEmpty())
        <p>Brak zdefiniowanych typów ćwiczeń.</p>
    @else
        <ul>
            @foreach($exerciseTypes as $type)
                <li>{{ $type->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection

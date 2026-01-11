@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nowa sesja treningowa</h2>

    {{-- BLOK NA BŁĘDY WALIDACJI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('training-session.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Data treningu</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Start treningu</label>
            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Koniec treningu</label>
            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
        </div>

        <button class="btn btn-success">Zapisz</button>
    </form>
</div>
@endsection

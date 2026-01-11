<?php

namespace App\Http\Controllers;

use App\Models\TrainingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExerciseType;
use App\Models\PerformedExercise;

class TrainingSessionController extends Controller
{
    // LISTA SESJI UŻYTKOWNIKA
    public function index()
    {
        $sessions = TrainingSession::where('user_id', Auth::id())
            ->orderBy('start_time', 'desc')
            ->get();

        return view('training-session.index', compact('sessions'));
    }

    // FORMULARZ DODAWANIA
    public function create()
    {
        return view('training-session.create');
    }

    // ZAPIS NOWEJ SESJI
    public function store(Request $request)
    {
        $request->validate([
            'date'       => 'required|date',
            // dla <input type="time"> wystarczy prosta walidacja
            'start_time' => 'required',
            'end_time'   => 'nullable',
        ]);

        TrainingSession::create([
            'user_id'    => Auth::id(),
            'date'       => $request->date,
            'start_time' => $request->start_time,
            'end_time'   => $request->end_time,
        ]);

        return redirect()
            ->route('training-session.index')
            ->with('success', 'Sesja treningowa została dodana.');
    }

    // FORMULARZ EDYCJI
    public function edit(TrainingSession $training_session)
    {
        // prosty bez polityki: upewnij się, że to SESJA zalogowanego usera
        abort_unless($training_session->user_id === Auth::id(), 403);

        // dociągamy ćwiczenia z tej sesji
        $training_session->load('exercises.exerciseType');

        return view('training-session.edit', compact('training_session'));
    }

    // ZAPIS EDYCJI SESJI
    public function update(Request $request, TrainingSession $training_session)
    {
        abort_unless($training_session->user_id === Auth::id(), 403);

        $request->validate([
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'nullable',
        ]);

        $training_session->update([
            'date'       => $request->date,
            'start_time' => $request->start_time,
            'end_time'   => $request->end_time,
        ]);

        return redirect()
            ->route('training-session.index')
            ->with('success', 'Sesja została zaktualizowana.');
    }

    // USUWANIE SESJI
    public function destroy(TrainingSession $training_session)
    {
        abort_unless($training_session->user_id === Auth::id(), 403);

        $training_session->delete();

        return redirect()
            ->route('training-session.index')
            ->with('success', 'Sesja została usunięta.');
    }

    // FORMULARZ DODAWANIA ĆWICZENIA DO SESJI
    public function addExerciseForm(TrainingSession $training_session)
    {
        abort_unless($training_session->user_id === Auth::id(), 403);

        $exerciseTypes = ExerciseType::orderBy('name')->get();

        return view('training-session.add-exercise', [
            'training_session' => $training_session,
            'exerciseTypes'    => $exerciseTypes,
        ]);
    }

    // ZAPIS WYKONANEGO ĆWICZENIA
    public function storeExercise(Request $request, TrainingSession $training_session)
    {
        abort_unless($training_session->user_id === Auth::id(), 403);

        $request->validate([
            'exercise_type_id' => 'required|exists:exercise_types,id',
            'weight'           => 'required|integer|min:0|max:2000',  // max 2000 kg
            'sets'             => 'required|integer|min:1|max:1000',  // max 1000 serii
            'reps'             => 'required|integer|min:1|max:1000',  // max 1000 powtórzeń
        ]);

        PerformedExercise::create([
            'training_session_id' => $training_session->id,
            'exercise_type_id'    => $request->exercise_type_id,
            'weight'              => $request->weight,
            'sets'                => $request->sets,
            'reps'                => $request->reps,
            'user_id'             => Auth::id(),
        ]);

        return redirect()
            ->route('training-session.edit', $training_session->id)
            ->with('success', 'Ćwiczenie zostało dodane.');
    }
}

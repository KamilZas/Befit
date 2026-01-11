<?php

namespace App\Http\Controllers;

use App\Models\PerformedExercise;
use App\Models\ExerciseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainingSession;

class PerformedExerciseController extends Controller
{
    /**
     * Formularz edycji konkretnego wykonanego ćwiczenia.
     */
    public function edit(PerformedExercise $performed_exercise)
    {
        // zabezpieczenie: tylko właściciel może edytować
        abort_unless($performed_exercise->user_id === Auth::id(), 403);

        $exerciseTypes = ExerciseType::orderBy('name')->get();

        return view('performed-exercises.edit', [
            'performed_exercise' => $performed_exercise,
            'exerciseTypes'      => $exerciseTypes,
        ]);
    }

    /**
     * Zapis zmian w wykonanym ćwiczeniu.
     */
  public function update(Request $request, PerformedExercise $performed_exercise)
{
    abort_unless($performed_exercise->user_id === Auth::id(), 403);

    $request->validate([
        'exercise_type_id' => 'required|exists:exercise_types,id',
        'weight'           => 'required|numeric|min:0|max:2000',
        'sets'             => 'required|integer|min:1|max:1000',
        'reps'             => 'required|integer|min:1|max:1000',
    ]);

    $performed_exercise->update([
        'exercise_type_id' => $request->exercise_type_id,
        'weight'           => $request->weight,
        'sets'             => $request->sets,
        'reps'             => $request->reps,
    ]);

    return redirect()
        ->route('training-session.edit', $performed_exercise->training_session_id)
        ->with('success', 'Ćwiczenie zostało zaktualizowane.');
}
    /**
     * Usunięcie wykonanego ćwiczenia z sesji.
     */
    public function destroy(PerformedExercise $performed_exercise)
    {
        abort_unless($performed_exercise->user_id === Auth::id(), 403);

        $sessionId = $performed_exercise->training_session_id;

        $performed_exercise->delete();

        return redirect()
            ->route('training-session.edit', $sessionId)
            ->with('success', 'Ćwiczenie zostało usunięte z sesji.');
    }
public function index()
{
    $user = Auth::id();

    // pobieramy sesje z ostatnich 28 dni (4 tygodnie)
    $sessions = TrainingSession::where('user_id', $user)
        ->where('date', '>=', now()->subWeeks(4))
        ->orderBy('date', 'desc')
        ->with(['exercises.exerciseType'])
        ->get();

    return view('statistics.index', compact('sessions'));
}

}

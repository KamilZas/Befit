<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    // LISTA ĆWICZEŃ
    public function index()
    {
        $exercises = Exercise::where('user_id', Auth::id())->get();

        return view('exercises.index', compact('exercises'));
    }

    // FORMULARZ DODAWANIA
    public function create()
    {
        return view('exercises.create');
    }

    // ZAPIS NOWEGO ĆWICZENIA
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|min:2|max:100',
            'weight' => 'nullable|numeric|min:0|max:1000',
            'reps'   => 'nullable|integer|min:1|max:200',
            'notes'  => 'nullable|string|max:500',
        ]);

        Exercise::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'weight'  => $request->weight,
            'reps'    => $request->reps,
            'notes'   => $request->notes,
        ]);

        return redirect()->route('exercises.index')
            ->with('success', 'Ćwiczenie zostało dodane.');
    }

    // FORMULARZ EDYCJI
    public function edit(Exercise $exercise)
    {
        abort_unless($exercise->user_id === Auth::id(), 403);

        return view('exercises.edit', compact('exercise'));
    }

    // ZAPIS EDYCJI
    public function update(Request $request, Exercise $exercise)
    {
        abort_unless($exercise->user_id === Auth::id(), 403);

        $request->validate([
            'name'   => 'required|string|min:2|max:100',
            'weight' => 'nullable|numeric|min:0|max:1000',
            'reps'   => 'nullable|integer|min:1|max:200',
            'notes'  => 'nullable|string|max:500',
        ]);

        $exercise->update($request->only(['name', 'weight', 'reps', 'notes']));

        return redirect()->route('exercises.index')
            ->with('success', 'Ćwiczenie zostało zaktualizowane.');
    }

    // USUWANIE
    public function destroy(Exercise $exercise)
    {
        abort_unless($exercise->user_id === Auth::id(), 403);

        $exercise->delete();

        return redirect()->route('exercises.index')
            ->with('success', 'Ćwiczenie zostało usunięte.');
    }
}

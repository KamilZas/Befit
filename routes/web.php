<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseTypeController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\PerformedExerciseController;

Route::resource('exercise-types', ExerciseTypeController::class);
Route::resource('training-session', TrainingSessionController::class)->middleware('auth');
Route::resource('stats', PerformedExerciseController::class)->middleware('auth');
Route::resource('performed-exercises', PerformedExerciseController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware('auth');

Route::get('/', function () {
    return view('welcome');
})->name('welcome'); 

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/training-session/{training_session}/add-exercise',
    [TrainingSessionController::class, 'addExerciseForm']
)->name('training-session.add-exercise');

Route::post('/training-session/{training_session}/add-exercise',
    [TrainingSessionController::class, 'storeExercise']
)->name('training-session.store-exercise');
Route::resource('exercises', ExerciseController::class)->middleware(['auth']);
// Edycja ćwiczenia
Route::get('/performed-exercises/{exercise}/edit', [PerformedExerciseController::class, 'edit'])
    ->name('performed-exercises.edit');

Route::put('/performed-exercises/{exercise}', [PerformedExerciseController::class, 'update'])
    ->name('performed-exercises.update');

// Usuwanie ćwiczenia
Route::delete('/performed-exercises/{exercise}', [PerformedExerciseController::class, 'destroy'])
    ->name('performed-exercises.destroy');
Route::get('/statistics', [PerformedExerciseController::class, 'index'])
    ->name('statistics.index')
    ->middleware('auth');

require __DIR__.'/auth.php';

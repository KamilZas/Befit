<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatsController extends Controller
{


public function index()
{
    $userId = auth()->id();
    $from = Carbon::now()->subWeeks(4)->startOfDay();

    $stats = DB::table('performed_exercises as pe')
        ->join('exercise_types as et', 'pe.exercise_type_id', '=', 'et.id')
        ->join('training_session as ts', 'pe.training_session_id', '=', 'ts.id')
        ->where('pe.user_id', $userId)
        ->where('ts.date', '>=', $from)
        ->groupBy('pe.exercise_type_id','et.name')
        ->selectRaw('pe.exercise_type_id, et.name as exercise_name,
            COUNT(*) as times_performed,
            SUM(pe.sets * pe.reps) as total_reps,
            AVG(pe.weight) as avg_weight,
            MAX(pe.weight) as max_weight')
        ->get();

    return view('stats.index', compact('stats'));
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformedExercise extends Model
{
    protected $fillable = [
        'user_id','training_session_id','exercise_type_id','weight','sets','reps','notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingSession()
    {
        return $this->belongsTo(TrainingSession::class);
    }

    public function exerciseType()
    {
        return $this->belongsTo(ExerciseType::class);
    }

    // helper — całkowite powtórzenia dla tego wpisu:
    public function totalReps()
    {
        return $this->sets * $this->reps;
    }
    
}

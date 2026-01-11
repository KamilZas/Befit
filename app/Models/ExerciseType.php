<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    protected $fillable = ['name','description'];

    public function performedExercises()
    {
        return $this->hasMany(PerformedExercise::class);
    }
}

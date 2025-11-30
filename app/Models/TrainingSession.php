<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $fillable = ['user_id','date','start_time','end_time','notes'];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function performedExercises()
    {
        return $this->hasMany(PerformedExercise::class);
    }
    public function exercises()
{
    return $this->hasMany(PerformedExercise::class);
}

}

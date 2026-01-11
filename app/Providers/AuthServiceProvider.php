<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
   protected $policies = [
    TrainingSession::class => TrainingSessionPolicy::class,
    PerformedExercise::class => PerformedExercisePolicy::class,
];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\PerformedExercise;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PerformedExercisePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
public function view(User $user, TrainingSession $session)
{
    return $user->id === $session->user_id;
}

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
public function update(User $user, TrainingSession $session)
{
    return $user->id === $session->user_id;
}
public function delete(User $user, TrainingSession $session)
{
    return $user->id === $session->user_id;
}
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerformedExercise $performedExercise): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerformedExercise $performedExercise): bool
    {
        return false;
    }
}

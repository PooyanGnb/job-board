<?php

namespace App\Policies;

use App\Models\Position;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PositionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Position $position): bool | Response
    {
        if ( $position->employer->user_id !== $user->id) 
        {
            return false;
        }

        if ($position->positionApplications()->count() > 0) {
            return Response::deny('Cannot change the position with applications');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Position $position): bool
    {
        return $position->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Position $position): bool
    {
        return $position->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Position $position): bool
    {
        return $position->employer->user_id === $user->id;
    }

    public function apply(User $user, Position $position) :  bool 
    {
        return !$position->hasUserApplied($user);
    }
}

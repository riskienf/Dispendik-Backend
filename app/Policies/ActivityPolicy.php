<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Activity $activity)
    {
        return $user->institution_id == $activity->institution_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Activity $activity)
    {
        return $user->isAdmin() && $user->institution_id == $activity->institution_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Activity $activity)
    {
        return $user->isAdmin() && $user->institution_id == $activity->institution_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Activity $activity)
    {
        // TODO user is admin and belongs to institution id
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Activity $activity)
    {
        // TODO user is admin and belongs to institution id
    }
}

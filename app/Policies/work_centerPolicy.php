<?php

namespace App\Policies;

use App\Models\User;
use App\Models\work_center;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class work_centerPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, work_center $workCenter): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, work_center $workCenter): bool
    {
        return $workCenter->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, work_center $workCenter): bool
    {
        return $this->update($user, $workCenter);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, work_center $workCenter): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, work_center $workCenter): bool
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\Organizational;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrganizationalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Organizational $organizational): bool
    {
        return $user->can('organizational:all');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('organizational:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Organizational $organizational): bool
    {
        return $user->can('organizational:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Organizational $organizational): bool
    {
        return $user->can('organizational:delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Organizational $organizational): bool
    {
        return $user->can('organizational:all');
    }
}

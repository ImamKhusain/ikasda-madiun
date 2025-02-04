<?php

namespace App\Policies;

use App\Models\Merchandise;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MerchandisePolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Merchandise $merchandise): bool
    {
        if ($merchandise->status === "published") {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($user->can('merchandise:all')) {
            return true;
        }

        return $user->id === $merchandise->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('merchandise:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Merchandise $merchandise): bool
    {
        return $user->id === $merchandise->user_id || $user->can('merchandise:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Merchandise $merchandise): bool
    {
        return ($user->id === $merchandise->user_id && $merchandise->status !== "published") || $user->can('merchandise:all');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Merchandise $merchandise): bool
    {
        return $user->id === $merchandise->user_id || $user->can('merchandise:all');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Merchandise $merchandise): bool
    {
        return $user->can('merchandise:delete');
    }
}

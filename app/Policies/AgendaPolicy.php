<?php

namespace App\Policies;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AgendaPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Agenda $agenda): bool
    {
        if ($agenda->status === "published") {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($user->can('agenda:all')) {
            return true;
        }

        return $user->id === $agenda->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('agenda:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Agenda $agenda): bool
    {
        return $user->id === $agenda->user_id || $user->can('agenda:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Agenda $agenda): bool
    {
        return ($user->id === $agenda->user_id && $agenda->status !== "published") || $user->can('agenda:all');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Agenda $agenda): bool
    {
        return $user->id === $agenda->user_id || $user->can('agenda:all');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Agenda $agenda): bool
    {
        return $user->can('agenda:delete');
    }
}

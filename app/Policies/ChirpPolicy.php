<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChirpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Misalnya, siapa saja bisa melihat semua chirp
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chirp $chirp): bool
    {
        // Hanya pemilik yang bisa melihat chirp
        return $user->id === $chirp->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Misalnya, semua user bisa membuat chirp
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool
    {
        // Hanya pemilik chirp yang bisa memperbarui
        return $chirp->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        // Hanya pemilik chirp yang bisa menghapus
        return $chirp->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chirp $chirp): bool
    {
        // Misalnya, hanya pemilik chirp yang bisa restore
        return $chirp->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chirp $chirp): bool
    {
        // Misalnya, hanya pemilik chirp yang bisa menghapus secara permanen
        return $chirp->user_id === $user->id;
    }
}

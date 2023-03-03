<?php

namespace App\Policies;

use App\Models\Libros;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibrosPolicy
{

    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Libros $libros)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return in_array($user->rol, ['bibliotecario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Libros $libros)
    {
        return in_array($user->rol, ['bibliotecario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Libros $libros)
    {
        return in_array($user->rol, ['bibliotecario']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Libros $libros)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Libros $libros)
    {
        //
    }
}

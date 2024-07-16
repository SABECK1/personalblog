<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->role()->role_name === 'ADMIN';
    }

    public function update(User $user): bool
    {
        return $user->role()->role_name === 'ADMIN';
    }
    public function delete(User $user): bool
    {
        return $user->role()->role_name === 'ADMIN';
    }
}

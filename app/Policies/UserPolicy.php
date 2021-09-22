<?php

namespace App\Policies;

use App\Project;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function seeAdmin(User $auth)
    {
        return $auth->role_id == Role::ADMIN;
    }

    public function store(User $auth)
    {
        return $auth->role_id == Role::ADMIN;
    }

    public function edit(User $auth, User $user)
    {
        return $auth->id == $user->id || $auth->role_id == Role::ADMIN;
    }

    public function update(User $auth, User $user)
    {
        return $auth->id == $user->id || $auth->role_id == Role::ADMIN;
    }
}

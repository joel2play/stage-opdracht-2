<?php

namespace App\Policies;

use App\Category;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function store(User $auth)
    {
        return $auth->role_id == Role::ADMIN;
    }

    public function update(User $auth)
    {
        return $auth->role_id == Role::ADMIN;
    }
}

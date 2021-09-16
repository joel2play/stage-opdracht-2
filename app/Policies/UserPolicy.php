<?php

namespace App\Policies;

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

    public function seeAdmin (User $auth){
        return $auth->id == Role::ADMIN;
    }

    public function create (User $auth){
        return true;
    }
}

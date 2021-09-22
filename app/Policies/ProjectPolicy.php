<?php

namespace App\Policies;

use App\Project;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
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

    public function edit(User $auth, Project $project)
    {
        return $auth->role_id == Role::ADMIN || $project->project_leader_id == $auth->id;
    }

    public function delete(User $auth, Project $project)
    {
        return $auth->role_id == Role::ADMIN || $project->project_leader_id == $auth->id;
    }

    public function join(User $auth, Project $project)
    {
        return !$project->users->contains($auth);
    }

    public function leave(User $auth, Project $project)
    {
        return $project->users->contains($auth) && $project->project_leader_id != $auth->id;
    }
}

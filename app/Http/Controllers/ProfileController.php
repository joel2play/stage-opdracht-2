<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index (){
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function show (User $user){;
        return view('profile.index', compact('user'));
    }

    public function edit(User $user){
        return view('profile.edit', compact('user'));
    }

    public function createProject () {
        return view('profile.project.create')->with('user', Auth::user());
    }

    public function editProject(Project $project){
        return view('profile.project.edit', compact('project'))->with('user', Auth::user());
    }

    public function projects(User $user){
        $projects = $user->projects->where('project_leader_id', $user->id)->sortByDesc('created_at');
        return view('profile.project.index', compact('projects'))->with('user', $user);
    }

    public function update(UpdateProfileRequest $request, User $user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->profile_picture != 'profiles/default.png' && $user->profile_picture != null && $request->has('profile_picture')){
            Storage::delete($user->profile_picture);
        }

        if ($request->has('profile_picture')) {
            $user->profile_picture = $request->profile_picture->store('profiles');
        }

        $user->save();

        return redirect(route('profile.show', $user));
    }
}

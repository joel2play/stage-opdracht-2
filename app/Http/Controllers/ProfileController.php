<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
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
        if(Auth::user()->can('edit', $user)){
            return view('profile.edit', compact('user'));
        }
        return back();
    }

    public function projects(User $user){
        $projects = $user->projects;
        return view('profile.projects', compact('projects'))->with('user', $user);
    }

    public function update(UpdateProfileRequest $request, User $user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->profile_picture != null && $request->has('profile_picture')){
            Storage::delete($user->profile_picture);
        }

        if ($request->has('profile_picture')) {
            $user->profile_picture = $request->profile_picture->store('profiles');
        }

        $user->save();

        return redirect(route('profile.show', $user));
    }
}

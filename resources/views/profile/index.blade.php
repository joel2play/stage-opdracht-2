@extends('layouts.profile')

@section('right')
    <div class="container">
        <div class="bg-white row mb-5">
            <div class="col-3 m-4">
                @if ($user->profile_picture == null)
                    <img src="{{ asset('images/profiles/default.png') }}" class="w-100 rounded-circle">
                @else
                    <img src="{{ asset('images/'. $user->profile_picture) }}" class="w-100 h-100 rounded-circle">
                @endif
            </div>

            <div class="col my-3 p-3 border-left">
                <h2>
                    {{ $user->name }}
                </h2>

                <p class="p-0 m-0">
                    E-mail: {{ $user->email }}
                </p>
                
                <p class="p-0 m-0">
                    Role: {{ $user->role->name }}
                </p>
                @can('edit', $user)
                    <a class="btn btn-warning" href="{{ route('profile.edit', $user) }}">
                        Edit
                    </a>
                @endcan
            </div>
        </div>

        <div class="bg-white p-5 mb-5" style="margin-right: -15px; margin-left: -15px;">
            <h4>
                Projects
            </h4>
        
            <div class="row">
                @foreach ($user->projects as $project)
                <div class="col-3">
                    <div>
                        <img class="w-100" src="{{ asset('images/'.$project->images->first()->file_name) }}">
                    </div>
        
                    <p class="text-center">
                        <a href="{{ route('project.show', $project) }}">
                            {{ $project->name }}
                        </a>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
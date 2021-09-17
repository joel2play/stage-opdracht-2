@extends('layouts.profile')

@section('right')
    <div class="container">
        <div class="bg-white row">
            <div class="col-3 m-4">
                @if ($user->profile_picture == null)
                    <img src="{{ asset('images/profiles/default.png') }}" class="w-100 rounded-circle">
                @else
                    <img src="{{ asset('images/'. $user->profile_picture) }}" class="w-100 rounded-circle">
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
    </div>
@endsection
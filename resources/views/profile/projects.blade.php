@extends('layouts.profile')

@section('right')

<div class="bg-white p-5" style="margin-right: -15px; margin-left: -15px;">
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

@endsection
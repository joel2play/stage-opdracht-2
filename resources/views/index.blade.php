@extends ('layouts.app')

@section ('content')

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>
                Projects
            </h3>

            <a class="btn btn-success px-4 py-3 font-weight-bold" href="{{ route('project.create') }}">
                Start a Project
            </a>
        </div>

        <div class="row justify-content-between">
            @foreach ($projects as $project)
                <div class="card col-3 p-0 mx-4 mt-5">
                    <img class="card-img-top" src="{{ asset('images/' . $project->images->first()->file_name) }}">
                    <div class="card-body">
                        <a href="{{ route('project.show', $project) }}">
                            <h3>
                                {{ $project->name }}
                            </h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
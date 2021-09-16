@extends ('layouts.app')

@section ('content')

    <div class="container">
        <div class="col-8 mx-auto">
            <div class="d-flex align-items-center justify-content-between">
                <h3>
                    Projects
                </h3>

                <a class="btn btn-success px-4 py-3 font-weight-bold" href="{{ route('project.create') }}">
                    Start a Project
                </a>
            </div>

            <div class="d-flex justify-content-between flex-wrap">
                @foreach ($projects as $project)
                    <div class="row bg-white border rounded w-100 mx-auto mt-5">
                        <img src="{{ asset('images/' . $project->images->first()->file_name) }}" class="col-4">
 
                        <div class="col-8 p-4">
                            <h3>{{ $project->name }}</h3>
                            <p>
                                {{ $project->description}}
                            </p>
                            <p>
                                ends on: {{ Carbon\Carbon::parse($project->end_date)->format('d-m-Y') }}
                            </p>
                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-success">
                                See more
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
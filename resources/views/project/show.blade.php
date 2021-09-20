    @extends ('layouts.app')

    @section('content')
    <div class="container">
        <div class="row bg-white p-3 border rounded w-100 mx-auto mt-5">
            <div id="carouselExampleControls" class="carousel slide w-100 d-flex justify-content-center" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($project->images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 200px;">
                            <img src="{{ asset('images/' . $image->file_name) }}" class="d-block h-100 mx-auto  " alt="...">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row w-100 p-5">
                <div class="col">
                    <h3>
                        {{ $project->name }}
                    </h3>
                    <p>
                        Project leader: {{ $project->project_leader()->name }}
                    </p>


                    <p>
                        Start date: {{ $project->start_date }}
                    </p>

                    <p>
                        End date: {{ $project->end_date }}
                    </p>

                    @can('join', $project)
                        <form action="{{ route('project.join', $project) }}" method="post">
                            @csrf
                            <button class="btn btn-success">
                                Join this Project
                            </button>
                        </form>
                    @else
                        <button class="btn btn-secondary">
                            You already joined this project
                        </button>
                    @endcan
                    
                </div>

                <div class="col">
                    <div>
                        {!! $project->description !!}
                    </div>

                    <div>
                        <span>Categories:</span>
                        @foreach ($project->categories as $categorie)
                            {{ $categorie->name }}    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border rounded w-100 mx-auto mt-5 p-5">
            <div>
                <h3>
                    Users
                </h3>
            </div>
            <div class="row overflow-auto pt-5">
                @if($project->users->isEmpty())
                    <p class="text-center w-100">
                        No users have joined yet
                    </p>
                @else
                    @foreach ($project->users as $user)
                        <div class="col-2">
                            @if ($user->profile_picture == null)
                                <img src="{{ asset('images/profiles/default.png') }}" class="w-100 rounded-circle">
                            @else
                                <img src="{{ asset('images/'. $user->profile_picture) }}" class="w-100 rounded-circle">
                            @endif
                            <p class="text-center">
                                <a href="{{ route('profile.show', $user) }}">
                                    {{ $user->name }}
                                </a>
                            </p>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>

        <div class="bg-white border rounded w-100 mx-auto mt-5 p-5">
            <div>
                <h3>
                    Comments
                </h3>
            </div>
            <div class="pt-5">
                <form action="{{ route('comment.store', $project) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>
                            Comment
                        </label>

                        <textarea name="content" class="ckeditor"></textarea>

                        <button class="btn btn-success mt-4">
                            Post
                        </button>
                    </div>

                </form>

                @if($project->users->isEmpty())
                    <p class="text-center w-100">
                        No comments yet
                    </p>
                @else
                    @foreach ($project->comments as $comment)
                        <div class="card p-4 mb-5">
                            <div class="mb-3">
                                <img src="{{ asset('images/'. $comment->user->profile_picture) }}" class="rounded-circle" style="width: 50px">
                                <a href="{{ route('profile.show', $comment->user) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </div>
                            <div>
                                {!! $comment->content !!}
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>

    @endsection
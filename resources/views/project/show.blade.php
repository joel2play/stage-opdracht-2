    @extends ('layouts.app')

    @section('content')
    <div class="container">
        <div class="col-8 mx-auto"> 
            <div class="row bg-white p-3 border rounded w-100 mx-auto mt-5">
                <div id="carouselExampleControls" class="carousel slide w-100 d-flex justify-content-center" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($project->images as $image)
                            <div class="carousel-item" style="height: 200px;">
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
                            Project leader: {{ \App\User::find($project->project_leader_id)->name }}
                        </p>


                        <p>
                            Start date: {{ $project->start_date }}
                        </p>

                        <p>
                            End date: {{ $project->end_date }}
                        </p>

                        <form action="{{ route('project.join', $project) }}" method="post">
                            @csrf
                            <button class="btn btn-success">
                                Meld je aan!
                            </button>
                        </form>
                        

                    </div>

                    <div class="col">
                        {!! $project->description !!}
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
                    @foreach ($project->users as $user)
                        <div class="col-3">
                            @if ($user->profile_picture == null)
                                <img src="{{ asset('images/profiles/default.png') }}" class="w-100 rounded-circle">
                            @endif
                            <p class="text-center">
                                <a href="#">
                                    {{ $user->name }}
                                </a>
                            </p>
                        </div>
                        
                            
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.carousel-item').classList.add('active');
    </script>

    @endsection
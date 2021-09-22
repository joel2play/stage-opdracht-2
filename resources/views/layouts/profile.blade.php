@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex ">
            <div class="col-3">
                <div class="bg-white rounded border p-4">
                    <h3>
                        Menu
                    </h3>
                    <ul>
                        <li>
                            <a href="{{ route('profile.index', $user) }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.projects', $user) }}">My projects</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-9">
                @yield ('right')
            </div>
        </div>
    </div>
@endsection

@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-3">
                <div class="bg-white rounded border p-4">
                    <h3>
                        Menu
                    </h3>
                    <ul>
                        <li>
                            <a href="{{ route('user.index') }}">Users</a>
                        </li>

                        <li>
                            <a href="{{ route('category.index') }}">Categories</a>
                        </li>

                        <li>
                            <a href="{{ route('project.index') }}">Projects</a>
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

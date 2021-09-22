@extends ('layouts.admin')

@section('right')

    <div class="bg-white rounded border p-4">
        <form action="{{ route('user.update', $user) }}" method="post">
            @csrf
            @method ('put')

            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror"
                    name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role_id" class="form-control @error('email') is-invalid @enderror">
                    @foreach (\App\Role::all() as $role)
                        <option value="{{ $role->id }}" @if ($user->role_id == $role->id) selected @endif>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-success">
                Save
            </button>
        </form>
    </div>

@endsection

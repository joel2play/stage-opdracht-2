@extends('layouts.profile')

@section('right')

    <div class="bg-white rounded border p-4">
        <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data">
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
                <label>Profile picture</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="profile_picture" type="file" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">
                Save
            </button>
        </form>
    </div>

@endsection

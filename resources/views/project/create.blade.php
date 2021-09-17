@extends ('layouts.app')

@section ('content')
    <div class="container">
        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data" class="card p-5">
            @csrf

            <h3 class="my-5 text-dark">
                Start a Project
            </h3>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" required class="form-control text-center @error('start_date') is-invalid @enderror" style="width: 200px;" value="{{ old('start_date') }}">
                @error ('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" required class="form-control text-center @error('end_date') is-invalid @enderror" style="width: 200px;" value="{{ old('end_date') }}">
                @error ('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required class="ckeditor" cols="30" rows="10"></textarea>
                @error ('description')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>

                <div class="custom-file">
                    <label class="custom-file-label">Picture(s)</label>
                    <input type="file" required name="images[]" class="custom-file-input @error('images') is-invalid @enderror" multiple>
                </div>
            </div>
            @error ('images')
                <p class="text-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
            
            <button class="btn btn-success mt-5">
                Create Project
            </button>
        </form>
        
    </div>
@endsection
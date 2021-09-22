@extends ('layouts.profile')

@section('right')
    <div class="bg-white rounded border p-4">
        <form action="{{ route('project.update', $project->id) }}" method="post">
            @csrf
            @method ('put')

            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $project->name }}" class="form-control @error('name') is-invalid @enderror"
                    name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="date" value="{{ $project->start_date }}" name="start_date"
                    class="form-control text-center @error('start_date') is-invalid @enderror" style="width: 200px;"
                    value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date" value="{{ $project->end_date }}" name="end_date"
                    class="form-control text-center @error('end_date') is-invalid @enderror" style="width: 200px;"
                    value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" cols="30"
                    rows="10">{{ $project->description }}</textarea>
                @error('description')
                    <span class="" role=" alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="py-5">
                <h5>
                    Categories
                </h5>

                <div class="row">
                    @foreach (\App\Category::all() as $category)
                        <div class="col-2 form-group">
                            <input type="checkbox" @if ($project->categories->has($category->id)) checked @endif name="{{ $category->id }}"
                                id="{{ $category->id }}">
                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>

                <div class="custom-file">
                    <label class="custom-file-label">Picture(s)</label>
                    <input type="file" name="images[]" class="custom-file-input @error('images') is-invalid @enderror"
                        multiple>
                </div>
            </div>

            @error('images')
                <p class="text-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror

            <button class="btn btn-success my-5">
                Save
            </button>
        </form>
    </div>
@endsection

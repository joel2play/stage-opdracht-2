@extends ('layouts.admin')

@section ('right')
<div class="bg-white rounded border p-4">
    <form action="{{ route('category.update', $category) }}" method="post">
        @csrf
        @method ('put')

        <div class="form-group">
            <label>Name</label>
            <input type="text" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" name="name">
            @error ('name')
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
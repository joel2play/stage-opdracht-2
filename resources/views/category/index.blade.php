@extends ('layouts.admin')

@section ('right')

    <div class="d-flex justify-content-between align-items-center">
        <h4>
            Categories
        </h4>
        <a href="{{ route('category.create') }}" class="btn btn-success">New Category</a>
    </div>
    <div class="bg-white rounded border p-4 my-4">
        <table>
            <thead>
                <td>
                    <strong>Name</strong>
                </td>
            </thead>
            
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="pr-5">
                            {{ $category->name }}
                        </td>

                        <td class="px-2">
                            <a href="{{ route('category.edit', $category) }}" class="text-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('category.delete', $category) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn text-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends ('layouts.admin')

@section ('right')

    <div class="d-flex justify-content-end">
        <a href="{{ route('user.create') }}" class="btn btn-success">New User</a>
    </div>
    <div class="bg-white rounded border p-4 my-4">
        <table>
            <thead>
                <td>
                    <strong>Name</strong>
                </td>
                
                <td>
                    <strong>Email</strong>
                </td>
                
                <td>
                    <strong>Role</strong>
                </td>
            </thead>
            
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="pr-5">
                            {{ $user->name }}
                        </td>
                        
                        <td class="pr-5">
                            {{ $user->email }}
                        </td>
                        
                        <td class="pr-5">
                            {{ $user->role->name }}
                        </td>
                        
                        <td class="px-2">
                            <a href="{{ route('user.edit', $user) }}" class="text-primary">Edit</a>
                        </td>
                        
                        <td>
                            <form action="{{ route('user.delete', $user) }}" method="post">
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
@extends ('layouts.admin')

@section ('right')

    <div class="d-flex justify-content-end">
        <a href="{{ route('project.create') }}" class="btn btn-success">New Project</a>
    </div>
    <div class="bg-white rounded border p-4 my-4">
        <table>
            <thead>
                <td>
                    <strong>Name</strong>
                </td>
                
                <td>
                    <strong>Project leader</strong>
                </td>
                
                <td>
                    <strong>Start date</strong>
                </td>
                
                <td>
                    <strong>End Date</strong>
                </td>
            </thead>
            
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="pr-5">
                            {{ $project->name }}
                        </td>

                        <td class="pr-5">
                            {{ \App\User::find($project->project_leader_id)->name }}
                        </td>

                        <td class="pr-5">
                            {{ Carbon\Carbon::parse($project->start_date)->format('d-m-Y') }}
                        </td>

                        <td class="pr-5">
                            {{ Carbon\Carbon::parse($project->end_date)->format('d-m-Y') }}
                        </td>

                        <td class="px-2">
                            <a href="{{ route('project.edit', $project) }}" class="text-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('project.delete', $project) }}" method="post">
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
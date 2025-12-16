<div>
    <h1 class="text-2xl font-bold mb-4">Projects</h1>

    @can('create', App\Models\Project::class)
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
    @endcan

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td class="flex gap-2">

                        @can('view', $project)
                            <a class="btn btn-info" href="{{ route('projects.show', $project) }}">Show</a>
                        @endcan

                        @can('update', $project)
                            <a class="btn btn-warning" href="{{ route('projects.edit', $project) }}">Edit</a>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
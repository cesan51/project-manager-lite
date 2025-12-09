<div>
    <h1 class="text-2xl font-bold mb-4">Companies</h1>

    @can('create', App\Models\Company::class)
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
    @endcan

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td class="flex gap-2">

                        @can('view', $company)
                            <a class="btn btn-info" href="{{ route('companies.show', $company) }}">Show</a>
                        @endcan

                        @can('update', $company)
                            <a class="btn btn-warning" href="{{ route('companies.edit', $company) }}">Edit</a>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
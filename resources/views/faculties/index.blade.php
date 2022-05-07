<x-layout title="All faculties">
    <a class="btn btn-primary" href="/faculties/add">Add new faculty</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->id }}</td>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->address }}</td>
                    <td>{{ $faculty->phone }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="/faculties/{{$faculty->id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
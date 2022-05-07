<x-layout title="All batches">
    <a class="btn btn-primary" href="/batches/add">Add new batch</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Faculty ID</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($batches as $batch)
                <tr>
                    <td>{{ $batch->id }}</td>
                    <td>{{ $batch->name }}</td>
                    <td>{{ $batch->faculty->id }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="/batches/{{$batch->id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
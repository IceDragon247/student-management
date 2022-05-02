<x-layout title="All subjects">
    <a class="btn btn-primary" href="/subjects/add">Add new subject</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Credits</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->credits }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="/subjects/{{$subject->id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>


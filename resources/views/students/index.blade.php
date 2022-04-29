<x-layout title="All students">
    <a class="btn btn-primary" href="/students/add">Add new student</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Batch</th>
                <th>Faculty</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->lastName }}</td>
                    <td>{{ $student->firstName }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->gender ? "Female" : "Male"}}</td>
                    <td>{{ $student->batch->name }}</td>
                    <td>{{ $student->batch->faculty->name }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="/students/{{$student->id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>


<html>
    <head>
        <title>All Students</title>
    </head>
    <body>
        <h1>All Students</h1>
        <a href="/students/add">Add new student</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Batch</th>
                <th>Faculty</th>
            </tr>

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
                        <a href="/students/{{$student->id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>

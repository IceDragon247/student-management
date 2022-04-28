<html>
    <head>
        <title>All Students</title>
    </head>
    <body>
        <h1>All Students</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Batch</th>
            </tr>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->lastName }}</td>
                    <td>{{ $student->firstName }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->gender ? "Female" : "Male"}}</td>
                    <td>{{ $student->batch_id }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>

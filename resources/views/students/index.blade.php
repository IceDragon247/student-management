<html>
    <head>
        <title>All Students</title>
    </head>
    <body>
        <h1>All Student</h1>
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

            @endforeach
        </table>
    </body>
</html>

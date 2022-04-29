<html>
    <head>
        <title> Student: {{ $student->name }}</title>
    </head>
    <body>
        <p>

            ID: {{ $student->id }}<br>
            Last name: {{ $student->lastName }}<br>
            First name: {{ $student->firstName }}<br>
            Date of birth: {{ $student->dob }}<br>
            Gender: {{ $student->gender }}<br>
            Batch: {{ $student->batch->name }}<br>
            Faculty: {{ $student->batch->faculty->name }}<br>

        </p>
    </body>
</html>
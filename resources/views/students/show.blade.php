<html>
    <head>
        <title> Student: {{ $student->name }}</title>
    </head>
    <body>
        <a href="/students">Back</a>
        <a href="/students/{{ $student->id }}/edit">Edit</a>
        <p>

            ID: {{ $student->id }}<br>
            Last name: {{ $student->lastName }}<br>
            First name: {{ $student->firstName }}<br>
            Date of birth: {{ $student->dob }}<br>
            Gender: {{ $student->gender }}<br>
            Batch: {{ $student->batch->name }}<br>
            Faculty: {{ $student->batch->faculty->name }}<br>

        </p>
        
        <form action="/students/{{ $student->id }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>
    </body>
</html>
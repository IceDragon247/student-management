<html>
    <head>
        <title>Add new student</title>
    </head>
    <body>
        <h1>Add new student</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/students" method="POST">
            @csrf

            <label for="lastName">Last name</label>
            <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}"><br>

            <label for="firstName">First name</label>
            <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}"><br>

            <label for="dob">Date of birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob') }}"><br>

            <label for="gender">Female</label>
            <input type="checkbox" name="gender" id="gender" value='1' @checked(old('gender') == 1 )><br>

            <label for="batch_id">Batch</label>
            <select name="batch_id" id="batch_id">
                @foreach ($batches as $batch)
                    <option value="{{$batch->id}}" @selected(old('batch_id') == $batch->id)>{{$batch->name}}</option>
                @endforeach
            </select><br>

            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<html>
    <head>
        <title>{{$edit ? 'Edit student #'.$student->id :  'Add new student'}}</title>
    </head>
    <body>
        <h1>{{$edit ? 'Edit student #'.$student->id :  'Add new student'}}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action={{ $edit ? '/students/'.$student->id : '/students'}} method="POST">
            @if ($edit)
                @method('PUT')
            @endif
            @csrf

            <label for="lastName">Last name</label>
            <input type="text" name="lastName" id="lastName" value="{{ old('lastName', $student->lastName) }}"><br>

            <label for="firstName">First name</label>
            <input type="text" name="firstName" id="firstName" value="{{ old('firstName', $student->firstName) }}"><br>

            <label for="dob">Date of birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}"><br>

            <label for="gender">Female</label>
            <input type="checkbox" name="gender" id="gender" value='1' @checked(old('gender', $student->gender) == 1 )><br>

            <label for="batch_id">Batch</label>
            <select name="batch_id" id="batch_id">
                @foreach ($batches as $batch)
                    <option value="{{$batch->id}}" @selected(old('batch_id', $student->batch_id) == $batch->id)>{{$batch->name}}</option>
                @endforeach
            </select><br>

            <input type="submit" value="Submit">
        </form>
    </body>
</html>
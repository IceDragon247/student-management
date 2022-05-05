<x-layout title="{{$edit ? 'Edit grade '.$grade->student_id.'/'.$grade->subject_id :  'Add new grade'}}">
    
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action= {{$edit ? '/grades/'.$grade->student_id.'/'.$grade->subject_id : '/grades'}} method="POST">
            @if ($edit)
                @method('PUT')
            @endif
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="student_id">Student ID</label>
                        <input class="form-control @error('student_id') is-invalid @enderror" type="text" name="student_id" id="student_id" value="{{ old('student_id', $grade->student_id) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('student_id'); }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="subject_id">Subject ID</label>
                        <input class="form-control @error('subject_id') is-invalid @enderror" type="text" name="subject_id" id="subject_id" value="{{ old('subject_id', $grade->subject_id) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('subject_id'); }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="firstGrade">First grade</label>
                        <input class="form-control @error('firstGrade') is-invalid @enderror" type="text" name="firstGrade" id="firstGrade" value="{{ old('firstGrade', $grade->firstGrade) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('firstGrade'); }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="secondGrade">Second grade</label>
                        <input class="form-control @error('secondGrade') is-invalid @enderror" type="text" name="secondGrade" id="secondGrade" value="{{ old('secondGrade', $grade->secondGrade) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('secondGrade'); }}
                        </div>
                    </div>
                </div>
                
            </div>

            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</x-layout>
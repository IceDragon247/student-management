<x-layout title="{{$edit ? 'Edit student #'.$student->id :  'Add new student'}}">
    
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

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="lastName">Last name</label>
                        <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName" id="lastName" value="{{ old('lastName', $student->lastName) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('lastName'); }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="firstName">First name</label>
                        <input class="form-control @error('firstName') is-invalid @enderror" type="text" name="firstName" id="firstName" value="{{ old('firstName', $student->firstName) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('firstName'); }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label" for="dob">Date of birth</label>
                        <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('dob'); }}
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label"for="batch_id">Batch</label>
                        <select class="form-select @error('batch_id') is-invalid @enderror"name="batch_id" id="batch_id">
                            @foreach ($batches as $batch)
                                <option value="{{$batch->id}}" @selected(old('batch_id', $student->batch_id) == $batch->id)>{{$batch->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"> 
                            {{ $errors->first('batch_id'); }}
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-check">
                        <label class="form-check-label" for="gender">Female</label>
                        <input class="form-check-input  @error('gender') is-invalid @enderror" type="checkbox" name="gender" id="gender" value='1' @checked(old('gender', $student->gender) == 1 )>
                        <div class="invalid-feedback"> 
                            {{ $errors->first('gender'); }}
                        </div>
                    </div>
                </div>
                
            </div>

            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</x-layout>
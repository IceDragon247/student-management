<x-layout title="{{$edit ? 'Edit batch #'.$batch->id :  'Add new batch'}}">
    
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action={{ $edit ? '/batches/'.$batch->id : '/batches'}} method="POST">
            @if ($edit)
                @method('PUT')
            @endif
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $batch->name) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('name'); }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="faculty_id">Faculty ID</label>
                        <input class="form-control @error('faculty_id') is-invalid @enderror" type="text" name="faculty_id" id="faculty_id" value="{{ old('faculty_id', $batch->faculty_id) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('faculty_id'); }}
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</x-layout>
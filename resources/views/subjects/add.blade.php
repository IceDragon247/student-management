<x-layout title="{{$edit ? 'Edit subject #'.$subject->id :  'Add new subject'}}">
    
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action={{ $edit ? '/subjects/'.$subject->id : '/subjects'}} method="POST">
            @if ($edit)
                @method('PUT')
            @endif
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $subject->name) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('name'); }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="credits">Credits</label>
                        <input class="form-control @error('credits') is-invalid @enderror" type="text" name="credits" id="credits" value="{{ old('credits', $subject->credits) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('credits'); }}
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</x-layout>
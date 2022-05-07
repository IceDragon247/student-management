<x-layout title="{{$edit ? 'Edit faculty #'.$faculty->id :  'Add new faculty'}}">
    
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action={{ $edit ? '/faculties/'.$faculty->id : '/faculties'}} method="POST">
            @if ($edit)
                @method('PUT')
            @endif
            @csrf

            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $faculty->name) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('name'); }}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <input class="form-control @error('faculty_id') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $faculty->address) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('address'); }}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $faculty->phone) }}">
                        <div class="invalid-feedback"> 
                            {{ $errors->first('phone'); }}
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</x-layout>
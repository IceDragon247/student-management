<html>
    <head>
        <title>Log in</title>
        <script src="/js/app.js"></script>
    </head>
    <body>
        <div class="container">
        <h1>Log in</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action='/login' method="POST">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Username</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
                            <div class="invalid-feedback"> 
                                {{ $errors->first('name'); }}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                            <div class="invalid-feedback"> 
                                {{ $errors->first('password'); }}
                            </div>
                        </div>
                    </div>
                </div>

                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
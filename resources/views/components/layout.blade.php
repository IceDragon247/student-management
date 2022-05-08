<html>
    <head>
        <title>{{ $title }}</title>
        <script src="/js/app.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Log out</button>
            </form>
            <h1>{{ $title }}</h1>
            {{ $slot }}
        </div>
    </body>
</html>
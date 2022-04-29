<html>
    <head>
        <title>{{ $title }}</title>
        <script src="/js/app.js"></script>
    </head>
    <body>
        <div class="container">
        <h1>{{ $title }}</h1>
           {{ $slot }}
        </div>
    </body>
</html>
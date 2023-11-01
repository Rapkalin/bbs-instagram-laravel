<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>BBS Instagram Feed</title>
    </head>

    <body class="bbs-instagram-body">

        @include('partials._navbar')

        <div class="main-bbs-content">
            @yield('content')
        </div>

        @include('partials._footer')
    </body>
</html>

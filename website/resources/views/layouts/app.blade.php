<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Ma page HTML</title>
    </head>


    <body class="bbs-instagram-body">
        @include('partials._navbar')

        <div>
            <header class="bbs-instagram-header">
                <h1>Mes posts Instagram</h1>
            </header>

            @yield('content')
        </div>

        @include('partials._footer')
    </body>
</html>

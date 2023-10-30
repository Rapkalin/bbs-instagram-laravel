<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Ma page HTML</title>
    </head>


    <body class="bbs-instagram-body">
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '826125512846824',
                    xfbml      : true,
                    version    : 'v18.0'
                });
                FB.AppEvents.logPageView();
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

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

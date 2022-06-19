<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="http://localhost/laradevelope/private/public/{{ mix('css/app.css') }}?{{ time() }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">

        <div id="app">

            <ul>
                <li><router-link to="/" >item.index!</router-link></li>
                <li><router-link to="/create" >item.create!</router-link></li>
            </ul>
            <router-view />
            @yield('content')
        </div>
        
        <script src="http://localhost/laradevelope/private/public/{{ mix('js/app.js') }}?{{ time() }}"></script>
     
    </body>
</html>

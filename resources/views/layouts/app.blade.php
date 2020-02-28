<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        
        <!-- Custom CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lafechta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- custom -->
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">

        <!-- CUSTOM CSS -->
        <link href="css/custom.css" rel="stylesheet">

    </head>
    <body>
        <div class="homeContainer">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="title m-b-md">
                <a href="{{ route('home') }}"> TITLE</a>
            </div>

            <div class="search">
                <div class="navButtons">
                    <div class="divBtn">
                        <a href="{{ route('isearch') }}">Je cherche</a>
                    </div>
                    
                    <div class="divBtn">
                        <a href="{{ url('/admin') }}">J'organise</a>
                    </div>
                </div>
            </div>

            @yield('content')


            <!-- footer ? -->
            <div class="copyrights">
                <p>© 2020 LaFechta. All Rights Reserved.</p>

                <a href="/">About</a>
                <a href="/">Rate app</a>
                <a href="/">Contact</a>
            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <script src="js/custom.js"></script>

        <!-- CUSTOM JS PER CONTENT -->
        @yield('javascript')
        
    </body>
</html>

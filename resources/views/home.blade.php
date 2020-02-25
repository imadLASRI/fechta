<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lafechta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- custom -->
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>

            @font-face {
                font-family: 'Bowlby One SC', cursive;
            }

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body{
                background: url('img/bg.png') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: black;
                padding-bottom: 20px;
            }

            .title {
                font-size: 84px;
                color: White;
                font-family: 'Bowlby One SC';
                letter-spacing: 20px;
            }

            .links{
                margin: 0 20px;
                width: 100%;
                height: 60px;
            }
            .home_select{
                margin: 0 10px 0px 0px;
                width: 30%;
                height: 60%;
                font-size: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    Lafechta
                </div>

                <div class="links">
                    <select name="music_type" id="music_type_select" class="home_select">
                        <option value="0">Music Type</option>
                        <option value="1">Rock</option>
                        <option value="2">Dance</option>
                        <option value="3">Oriental</option>
                    </select>

                    <select name="city_select" id="city_select" class="home_select">
                        <option value="0">City</option>
                        <option value="1">Rabat</option>
                        <option value="2">Casablanca</option>
                    </select>

                    <select name="time_select" id="time_select" class="home_select">
                        <option value="0">Today</option>
                        <option value="1">Tomorrow</option>
                        <option value="2">This week</option>
                        <option value="3">Next Week</option>
                    </select>
                </div>
            </div>
        </div>

    </body>
</html>

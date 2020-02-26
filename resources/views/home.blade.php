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
                TITLE
            </div>

            <div class="eventsContainer">
                @foreach($events as $event)
                    <div class="event">
                        <a href="" class="event-link">
                            <div class="event-cover" style="background-image:url({!! Storage::disk('public')->url(str_replace('\\', '/', $event->event_image)) !!})">
                            </div>
                            <h5 class="event-label">
                                <div class="Label">
                                    <span>{{ $event->event_name }}</span>
                                </div>
                            </h5>
                        </a>
                    </div>
                @endforeach

                <!-- SEE ALL arrow button -->
                    <div class="event">
                        <a class="arrow-btn arrow-block" href="">
                            <div class="next-icon"></div>
                        </a>
                    </div>
            </div>

            <!-- footer ? -->
            <div class="ok">

            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>

        <script src="js/custom.js"></script>
    </body>
</html>

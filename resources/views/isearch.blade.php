@extends('layouts.app')

@section('content')

    <!-- overrinding the search buttons style -->
    <style>
        .divBtn:first-of-type {
            color: #e4d1ad;
            background-color: #b50e12;
            pointer-events: none;
        }

        .contentContainer {
            margin-bottom: 10px;
        }
    </style>

    <!-- EVENTS -->

    <div class="containerTitle">
        <h5 class="container-label">
            <div class="Label">
                <span>All Upcoming Events</span>
            </div>
        </h5>
    </div>




    <!-- PLACES -->

    <div class="containerTitle">
        <h5 class="container-label">
            <div class="Label">
                <span>All Available Places</span>
            </div>
        </h5>
    </div>

    <div class="contentContainer">
        @foreach($places as $place)
            <div class="dbContent">
                <a href="" class="dbContent-link">
                    <div class="dbContent-cover" style="background-image:url({!! Storage::disk('public')->url(str_replace('\\', '/', $place->place_image)) !!})">
                    </div>
                    <h5 class="dbContent-label">
                        <div class="Label">
                            <span>{{ $place->place_name }}</span>
                        </div>
                    </h5>
                </a>
            </div>
        @endforeach
    </div>

@endsection

@section('javascript')

    <script>
        $(function(){
            console.log('search js loaded')
            fetch_data(1);

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });


            function fetch_data(page)
            {
                $.ajax({
                    url:"isearch/fetch_data?page="+page,
                    success:function(data)
                    {
                        // var newcontent = $(document.createElement('div'));
                        // newcontent.html(data);

                        var eventsTitle = $('.containerTitle')[0];

                        $($.parseHTML(data)).insertAfter( eventsTitle );
                        // $('#here').html(data);
                        // console.log($.parseHTML(data))
                    }
                });
            }






        $(document).bind('DOMSubtreeModified',function(){
            // on dom change...

            // LOAD MORE
            $('.next-icon').click(function(e){
                e.preventDefault();
                var nextbtn = $(this);

                console.log('clicked next BUTTON')

                // $.each($('.contentContainer .dbContent'), function(i, val){
                    // if( $(val).hasClass('next-btn') == false ){
                        $(nextbtn).closest('.contentContainer').animate({
                            opacity: 0,
                            // left: "+=1000",
                            // height: "toggle"
                        }, 400, function(){
                            $(nextbtn).closest('.contentContainer').remove();
                            console.log('deleted');
                            fetch_data(2);
                            console.log('appended the next');
                        });
                    // }
                // });

                // setTimeout( function(){
                //     $(nextbtn).closest('.contentContainer').remove();
                //     console.log('deleted');
                //     fetch_data(2);
                //     console.log('appended the next');
                // }, 400);
            });
        });

        });


    </script>

@stop
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

    <div class="contentContainer events">
        @foreach($events as $event)
            <div class="dbContent event" data-id="{{ $event->id }}">
                <a href="" class="dbContent-link">
                    <div class="dbContent-cover" style="background-image:url({!! Storage::disk('public')->url(str_replace('\\', '/', $event->event_image)) !!})">
                    </div>
                    <h5 class="dbContent-label">
                        <div class="Label">
                            <span>{{ $event->event_name }}</span>
                        </div>
                    </h5>
                </a>
            </div>
        @endforeach

        <!-- LOAD MORE arrow button -->
        <div class="dbContent next-btn">
            <a class="arrow-btn arrow-block" href="">
                <div class="next-icon"></div>
            </a>
        </div>
    </div>


    <!-- PLACES -->

    <div class="containerTitle">
        <h5 class="container-label">
            <div class="Label">
                <span>All Available Places</span>
            </div>
        </h5>
    </div>

    <div class="contentContainer places">
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
            // MORE CONTENT
            $('div.dbContent.next-btn').click(function(e){
                // var nextbtn = $(this);
                e.preventDefault();

                loadNext( $(this) );
            });

            function deletePrev(el){
                // Animation and deletion of prev elements
                var lastLoaded = el.prev('.event').data('id');

                $.each( el.closest($('.contentContainer')).children('.dbContent'), function(i, val){
                    if( $(val).hasClass('next-btn') == false ){
                        $(this).animate({
                            opacity: 0,
                            // left: "+=1000",
                            // height: "toggle"
                        }, 400, function() {
                            $(this).remove();
                            // TODO : Handle ajax request before removing
                        });
                    }
                });

                return lastLoaded;
            }

            function loadNext(el){
                var last = deletePrev(el);

                $.ajax({
                    dataType: 'JSON',
                    type: 'POST',
                    url: '/loaddata',
                    data : {
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        // 'first_IdLoaded' : ,
                        'last_IdLoaded' : last,
                    },

                    success: function(data) {
                        console.log(data['moreEvents'])

                            var img = '';
                            // LAST EVENT div
                            // console.log(el.parent().find('.event').last())

                            $.each(data['moreEvents'], function(i, value){
                                // replacing all \ 
                                img = (value.event_image).replace(/\\/g, '/');

                                // Append JSX before next btn element
                                $(`
                                    <div class="dbContent event" data-id="` + value.id + `">
                                        <a href="" class="dbContent-link">
                                            <div class="dbContent-cover" style="background-image:url('storage/` + img + `')"></div>
                                            <h5 class="dbContent-label">
                                                <div class="Label">
                                                    <span>` + value.event_name + `</span>
                                                </div>
                                            </h5>
                                        </a>
                                    </div>
                                `).insertBefore(el);
                            });
                    }
                });
            }

            // on DOM TREE change...
            $(document).bind('DOMSubtreeModified',function(){

                labelStyle();

            });
        });

    </script>

@stop
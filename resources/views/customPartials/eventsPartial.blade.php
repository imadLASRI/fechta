

    <div class="contentContainer">
        @foreach($events as $event)
            <div class="dbContent">
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

    <!-- temp -->
    <div style="width:100%;height: 100px; color: white">
        {{ $events->links() }}
    </div>
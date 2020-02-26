@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        
        <!-- CLEAN -->
        <div id="dashboardBaner">
            <p class="welcomeMsg">Manager Panel</p>
        </div>

    </div>
@stop

@section('javascript')

<script>
    $(function(){
        console.log('ok dash')
        $('.welcomeMsg').hide();
        $('.welcomeMsg').fadeIn(1000);


    });
</script>

@stop
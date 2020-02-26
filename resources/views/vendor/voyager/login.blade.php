<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Admin - {{ Voyager::setting("admin.title") }}</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {
            background-image:url('{{ Voyager::image( Voyager::setting("admin.bg_image"), voyager_asset("images/bg.jpg") ) }}');
            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }
        body.login .login-sidebar {
            border-top:5px solid {{ config('voyager.primary_color','#22A7F0') }};
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid {{ config('voyager.primary_color','#22A7F0') }};
            }
        }
        body.login .form-group-default.focused{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .remember-me-text{
            padding:0 5px;
        }

        /* CUSTOM LOGIN PAGE CSS */

        body.login .login-sidebar {
            border-top: 5px solid #b50e12 !important;
        }

        body.login .login-sidebar {
            background: #000000c7 !important;
        }

        body.login .form-group-default {
            background: #e4d1ad;
        }
        body.login .form-group-default.focused {
            border-color: #b50e12;
        }
        body.login .login-button{
            background: #b50e12;
            font-weight: bold;
        }
        body.login .login-container p{
            font-size: 12px;
        }
        body.login .login-container {
            top: 20%;
        }

        .newManager{
            width: 35%;
            position: absolute;
            top: 30px;
            left: 40px;
            background: #e4d1adb8;
            border: 2px #b50e12;
            border-radius: 10px;
            box-shadow: 1px 2px 11px 4px black;

            color: white;
            font-weight: bold;
            font-size: 15px;
            padding: 20px;
        }

        .newManager_contact{
            display: flex;
            flex-direction: column;
        }
        .newManager_contact input, .newManager_contact textarea{
            color: black;
        }

        .sendMail{
            background: #b50e12;
            font-weight: bold;
            border: none ;
        }

        /* END MANAGER LOGIN PAGE */
    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">

        <!-- CUSTOM DIV INSIDE FOR NEW MANAGERS -->
        <div class="faded-bg animated">
            <div class="newManager">
                <p class="howToManager">Vous souhaitez organiser un évenement ?</p>
                <p class="howToManager">Prenez contact avec les administrateurs de la platform, et profitez de <strong class="howToManager">LaFetcha</strong>.</p>
                
                <div class="newManager_contact">
                    <form action="">
                        <label for="newManager_name">Nom et prénom* :</label><br>
                            <input id="newManager_name" type="text"><br>
                        <label for="newManager_email">Adresse mail* :</label><br>
                            <input id="newManager_email" type="text"><br>
                        <label for="newManager_place">Nom du club* :</label><br>
                            <input id="newManager_place" type="text"><br>
                        <label for="newManager_comm">Commentaire :</label><br>
                            <textarea id="newManager_comm"  rows="4" cols="30"></textarea><br>
    
                        <button class="sendMail" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                        <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                        <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                        <div class="copy animated fadeIn">
                            <h1>{{ Voyager::setting('admin.title', 'Voyager') }}</h1>
                            <p>{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container">

                <p>{{ __('voyager::login.signin_below') }}</p>

                <form action="{{ route('voyager.login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>{{ __('voyager::generic.email') }}</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('voyager::generic.password') }}</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group" id="rememberMeGroup">
                        <div class="controls">
                        <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                        <span class="signin">{{ __('voyager::generic.login') }}</span>
                    </button>

              </form>

              <div style="clear:both"></div>

              @if(!$errors->isEmpty())
              <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
              </div>
              @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
       document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
       document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>
</html>

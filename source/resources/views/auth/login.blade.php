<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Entrar</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
    <br/>
        <h4 class="container teal-text text-darken-3">Login</h4>

    <section id="contact" class="section section-contact">
      <form class="container" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      @csrf

        <div class="row">
            <div class="input-field col s12 m8 l6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : 'Mensagem' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback red-text text-darken-2" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>

            @endif
            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
            </div>

            <div class="input-field col s12 m8 l6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback red-text text-darken-2" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
            </div>

            <!--<div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> -->

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary light-green darken-3">
                        {{ __('Entrar') }}
                    </button>
                    <a class="btn btn-primary light-green darken-3" href="{{ route('google.login') }}">
                        {{ __('Entrar com Google') }}
                    </a>
                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a> -->
                </div>
            </div>
            <a class="btn btn-primary orange darken-3" href="/cadastroCliente">
                        {{ __('Registrar-se') }}
            </a>
        </form>
    </section>
</body>

@include('layouts.Footer')

<body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script>
        $('.dropdown-trigger').dropdown({
            alignment: 'right',
            coverTrigger: false,
            constrainWidth: false,
        });

        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('.carousel').carousel({
                dist: -10,
                indicators:true,
            }
            );
        });
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, {
            toolbarEnabled: true
            });
        });
    </script>

</body>

</html>

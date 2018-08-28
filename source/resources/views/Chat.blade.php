<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - minha conta</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
    
    <section class='container'>
        <div class="row">
            <a class='green-text text-darken-3 valign-wrapper' href='/perfil?tab=mensagens'>
                <i class="tiny material-icons green-text text-darken-3">arrow_back</i> &nbsp;&nbsp; <font size='4'>Voltar</font>
            </a>
        </div>
        <font size='6' class='green-text text-darken-3'>Chat &dash; {{$other_name}}</font><br>
        <font size='4' class='green-text text-darken-3'>Anúncio: {{$ad_title}}</font><br>
        <br>
    </section>
    <section class='container'>
        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    @foreach($message_list as $message)
                        <div class="row">
                            @if($message->sender_id == Auth::user()->id)
                                <div class="class col s2 m3 l4"></div>
                                <?php $color='lime accent-4'; ?>
                            @else
                                <?php $color='amber lighten-1'; ?>
                            @endif
                            <div class="col s10 m9 l8">
                                <div class="card-panel {{$color}}">
                                    <span class='row'>
                                        <span class="col s10">
                                            {{$message->text}}
                                        </span>
                                        @if($color == 'lime accent-4' && $message->b_read)
                                            <span class='col s2'>
                                                <i class="material-icons green-text">check</i>
                                                <font size='2'>
                                                    {{$message->created_at}}
                                                </font>
                                            </span>
                                        @elseif($color == 'lime accent-4')
                                            <span class='col s2'>
                                                <i class="material-icons grey-text text-lighten-2">check</i>
                                                <font size='2'>
                                                    {{$message->created_at}}
                                                </font>
                                            </span>
                                        @else
                                            <span class='col s2'>
                                                <font size='2'>
                                                    {{$message->created_at}}
                                                </font>
                                            </span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="row">
                        <form action="/send-message" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="sender_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name="recipient_id" value="{{$other_id}}"/>
                            <input type="hidden" name="ad_id" value="{{$ad_id}}"/>
                            <div class="row center valign-wrapper">
                                <div class="input-field col s12 m9 l10">
                                    <label for="message_text">&nbsp;&nbsp;mensagem...</label>
                                    <textarea id="message_text" class="materialize-textarea" name="message_text"></textarea>
                                </div>
                                <div class="col s12 m3 l2">
                                    <button class="btn-flat teal darken-3 white-text waves-effect waves-light center" type="submit" name="submit">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
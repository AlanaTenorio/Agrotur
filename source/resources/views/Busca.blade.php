<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - busca</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<style>
.centered-and-cropped { object-fit: cover }
.small-input-field { width: 60px; } 
</style>


<body>
    <!--adicionada temporariamente aqui, será removida quando estiver pronta na navbar-->
    <nav class="white">
        <div class="nav-wrapper container">
            <form>
                <div class="input-field">
                    <input placeholder="Exemplos: um local ou algo que você queira fazer" id="search" type="search" required>
                    <label class="label-icon" for="search">
                        <i class="material-icons grey-text">search</i>
                    </label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>

    <br><br><br>

    <div class="row">
        <div class="col l3 hide-on-med-and-down">
            <form action="#">
                <div class="container">
                    <div class="row">
                        <p>
                            <h5>Tipo</h5>
                            <label>
                                <input type="checkbox" class="filled-in" checked="checked" />
                                <span>Hospedagem</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <h5>Localização</h5>
                        <div class="grey-text text-darken-2">
                            Acre<br>
                            Amapá<br>
                            ...
                        </div>
                    </div>
                    <div class="row">
                        <h5>Preço</h5>
                        <div class="grey-text text-darken-2">
                            Até R$100,00 <br>
                            R$100,00 a R$300,00 <br>
                            R$300,00 a R$500,00 <br>
                            Acima de R$500,00
                            <div class="row">
                                <div class="input-field inline small-input-field">
                                    <input id="email_inline" type="email" class="validate">
                                    <label for="email_inline">min</label>
                                </div>
                                &mdash;
                                <div class="input-field inline small-input-field">
                                    <input id="email_inline" type="email" class="validate">
                                    <label for="email_inline">max</label>
                                </div>
                                <a class="btn-floating btn-small waves-effect waves-light green darken-4">
                                    <i class="material-icons small">keyboard_arrow_right</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col s12 l8">
            <div class="row">
                @if(Auth::guard()->check())
                <?php
                $favoritos = \App\Favorito::where('cliente_id', '=', Auth::user()->id)->get();
                ?>
                <ul id='dropdown_Favorites' class=''>
                @foreach ($favoritos as $favorito)
            <li>
                <?php $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($favorito->anuncio_id) ?>

                <div class="row">
                    <div class="col s2 center">
                        <a href="/Exibir{{ $adData['type'] }}/{{ $adData['id'] }}">
                            <img class="centered-and-cropped" style="border-radius:0%" src="{{ $adData['image'] }}" width=150 height=150>
                        </a>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s9">
                        <div class="row">
                            <div class="col s8">
                                <a class='grey-text text-darken-2' href='/Exibir{{ $adData["type"] }}/{{ $adData["id"] }}'>
                                    <h5>{{ $adData['title'] }}</h5>
                                </a>
                            </div>
                            <div class="col s4">
                                <h5 class='right'>R$ {{ $adData['price'] }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            
                            {{substr($adData['description'], 0, 400)}}
                            @if (strlen($adData['description']) > 400)
                                ...
                            @endif
                        </div>
                    </div>
                </div>
            <hr><br>
            </li>
            @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>


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

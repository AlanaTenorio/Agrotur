<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - favoritos</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<style>
.centered-and-cropped { object-fit: cover }
</style>


<body>
<!-- Listagem -->
    <div class="container white">
        <h4>Favoritos</h4>
        <br>
        <ul>
            @foreach ($favoritos as $favorito)
            <li>
            <hr>
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
            </li>
            @endforeach
            <span class='center'>
                <!--TODO Incluir paginação aqui -->
            </span>
        </ul>
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

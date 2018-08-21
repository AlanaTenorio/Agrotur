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
    <br>
    <section class="container">
        <div class="row">
            <h4 class="green-text text-darken-3">
                {{$vendedor->nome}}
            </h4>
            <strong>Avaliação: </strong>{{$nota}}
        </div>
        <div class="row">
            <div class="col s12">
                <h5 class="green-text text-darken-3">
                    Anúncios deste vendedor
                </h5>
                <div>
                    <ul>
                        @foreach ($ads as $ad)
                        <li>
                        <hr>
                            <?php
                                $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($ad->id);
                                $adRevenue = \App\Http\Controllers\AnuncioController::getReceitaAnuncio($ad->id);
                            ?>

                            <div class="row">
                                <div class="col s3 m2 center">
                                    <a href="/Exibir{{ $adData['type'] }}/{{ $adData['id'] }}">
                                        <img class="centered-and-cropped valign-wrapper" style="border-radius:0%" src="{{ $adData['image'] }}" width=100 height=100>
                                    </a>
                                </div>
                                <div class="col s9 m10">
                                    <div class="row">
                                        <div class="col s12 l7">
                                            <a class='green-text text-darken-3' href='/Exibir{{ $adData["type"] }}/{{ $adData["id"] }}'>
                                                <h5>{{ $adData['title'] }}</h5>
                                            </a>
                                        </div>
                                        <div class="col s12 l5">
                                            <h5>
                                                Valor: R$ {{ $ad->preco }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 l7">
                                            {{substr($adData['description'], 0, 400)}}
                                            @if (strlen($adData['description']) > 400)
                                                ...
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @if (sizeof($ads) == 0)
                            <h2 class="valign-wrapper center">Este vendedor não possui anúncios cadastrados</h2>
                        @endif
                        <span class='center'>
                            <!--TODO Incluir paginação aqui -->
                        </span>
                    </ul>
                </div>
            </div>
            <div class="col s12">
                
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

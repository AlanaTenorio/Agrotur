<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - Busca</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
<!-- Listagem -->
    <div class="container white">
        <h4>Resultados</h4>
        <br>
        <form class="col s12 m12">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    @foreach ($hospedagens as $hospedagem)
                                    <?php $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($hospedagem->id) ?>

                                     <div class="col s06 m3 l3 xl3">
                                    <div class="card small">
                                        <div class="card-image waves-effect waves-block waves-light">
                                          <a href="/Exibir{{ $adData['type'] }}/{{ $adData['id'] }}">
                                              <img class="centered-and-cropped" style="border-radius:0%" src="{{ $adData['image'] }}" width=150 height=150>
                                          </a>
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title activator grey-text text-darken-4">
                                              {{ $adData['title'] }}
                                              <i class="material-icons right">more_vert</i>
                                            </span>
                                            <p>
                                               R$: {{ $adData['price'] }}
                                            </p>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">
                                                <i class="material-icons right">close</i>
                                            </span>
                                            <p>
                                                {{ $adData['description'] }}
                                            </p>
                                        </div>

                                    <tr>
                                        
                                    </tr>
                                    @endforeach
                                    @if (sizeof($hospedagens) == 0)
                                        <h2 class="valign-wrapper center">Nenhum resultado encontrado</h2>
                                    @endif
                                    @foreach ($servicosh as $servicoh)
                                    <tr>
                                        <th scope="col"><i class="material-icons">landscape</i></th>
                                        <th scope="col"> {{$servicoh->nomePropriedade}}</th>
                                        <th scope="col"><a href="/ExibirHospedagem/{{$servicoh->id}}">Visualizar</a></th></th>
                                    </tr>
                                    @endforeach
                        
                                    @foreach ($servicos as $servico)
                                    <tr>
                                        <th scope="col"><i class="material-icons">clear</i></th>
                                        <th scope="col"> {{$servico->nomeServico}}</th>
                                        <th scope="col"><a href="/ExibirServico/{{$servico->id}}">Visualizar</a></th></th>
                                    </tr>
                                    @endforeach
                                    <br><br><br>
                                    <div class=" center col-md-8 offset-md-4">
                                        <a class="btn-large btn-primary light-green darken-3 center" href="/busca">
                                            {{ __('Voltar') }}
                                        </a>
                                    </div>
                
                                </thead>
                            </table>
                        </div>
        </div>
    </form>        
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
                accordion: false
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

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
    <section class='container'>
        @if (Auth::user()->id != $seller_id)
        <div>
            <h2 class="valign-wrapper center">Você não tem permissão para acessar esta página!</h2>
        </div>
        @else
        
        <?php
            $adRevenue = \App\Http\Controllers\AnuncioController::getReceitaAnuncio($id);
        ?>
        <div class="row">
            <div class="col s12">
                <h5 class="green-text text-darken-3">
                    Histórico de vendas: <a href="/Exibir{{ $type }}/{{ $id }}">{{$title}}</a>
                </h5>
            </div>
            <div class="col s12">
                <strong class="green-text text-darken-3">Receita do anúncio: </strong>{{ number_format ( $adRevenue, 2, '.', '' ) }}
            </div>
        </div>
        <div class='row'>
            <ul>
                @foreach ($transactions as $transaction)
                <li>
                <hr>
                    <?php
                        $clientName = \App\Cliente::where('id', $id)->get()->first()->nome;
                    ?>
                    <div class="row">
                        <div class="col s3 m2 center">
                            <img class="centered-and-cropped valign-wrapper" style="border-radius:0%" src="{{ $icon }}" width=100 height=100>
                        </div>
                        <div class="col s9 m10">
                            <div class="row">
                                <div class="col s12 l7">
                                    <h5>{{ $title }}</h5>
                                </div>
                                <div class="col s12 l5">
                                    <h5>
                                        Valor total: R$ {{ $transaction->precoTotal }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 l4">
                                    <strong>Comprador: </strong> {{ $clientName }}
                                </div>
                                <div class="col s6 l5">
                                    <strong>Período: </strong>
                                        {{ substr($transaction->dataEntrada, 0, 10) }} - {{ substr($transaction->dataSaida, 0, 10) }}
                                    </div>
                                <div class="col s6 l3">
                                    <strong>Diária: R$</strong> {{ $price }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                @if (sizeof($transactions) == 0)
                    <h2 class="valign-wrapper center">Você não realizou nenhuma venda</h2>
                @endif
                <span class='center'>
                    <!--TODO Incluir paginação aqui -->
                </span>
            </ul>
        </div>
        @endif
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

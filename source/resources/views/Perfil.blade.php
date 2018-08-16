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
    <?php
        $tab = "conta";
        if (array_key_exists("tab", $_GET)) {
            $tab = $_GET["tab"];
        }
    ?>
    <div class="row">
        <div class="col l2 hide-on-med-and-down"> <!--barra lateral-->
            <?php
                if ($tab == "conta"){
                    $iconColor = "green-text text-darken-3";
                    $textAccent = "text-darken-3";
                }
                else {
                    $iconColor = "grey-text text-darken-1";
                    $textAccent = "text-darken-1";
                }
            ?>
            <div>
                <a href="/perfil?tab=conta" class="grey-text {{$textAccent}} valign-wrapper">
                    <i class="material-icons left {{$iconColor}}">person</i>
                    <h6><strong>Minha Conta</strong></h6>
                </a>
            </div>
            <?php
                if ($tab == "compras"){
                    $iconColor = "green-text text-darken-3";
                    $textAccent = "text-darken-3";
                }
                else {
                    $iconColor = "grey-text text-darken-1";
                    $textAccent = "text-darken-1";
                }
            ?>
            <div>
                <a href="/perfil?tab=compras" class="grey-text {{$textAccent}} valign-wrapper">
                    <i class="material-icons left {{$iconColor}}">local_mall</i>
                    <h6><strong>Compras</strong></h6>
                </a>
            </div>
            <?php
                if ($tab == "anuncios"){
                    $iconColor = "green-text text-darken-3";
                    $textAccent = "text-darken-3";
                }
                else {
                    $iconColor = "grey-text text-darken-1";
                    $textAccent = "text-darken-1";
                }
            ?>
            <div>
                <a href="/perfil?tab=anuncios" class="grey-text {{$textAccent}} valign-wrapper">
                    <i class="material-icons left {{$iconColor}}">attach_money</i>
                    <h6><strong>Anúncios</strong></h6>
                </a>
            </div>
        </div>
        <div class="col s12 hide-on-large-only"> <!--barra topo (mobile)-->
            <div class="col s4 center">
                <?php
                    if ($tab == "conta"){
                        $iconColor = "green-text text-darken-3";
                        $textAccent = "text-darken-3";
                    }
                    else {
                        $iconColor = "grey-text text-darken-1";
                        $textAccent = "text-darken-1";
                    }
                ?>
                <div class="center">
                    <a href="/perfil?tab=conta" class="grey-text {{$textAccent}} valign-wrapper">
                        <i class="material-icons {{$iconColor}}">person</i>
                        <h6><strong>Conta</strong></h6>
                    </a>
                </div>
            </div>
            <div class="col s4">
                <?php
                    if ($tab == "compras"){
                        $iconColor = "green-text text-darken-3";
                        $textAccent = "text-darken-3";
                    }
                    else {
                        $iconColor = "grey-text text-darken-1";
                        $textAccent = "text-darken-1";
                    }
                ?>
                <div class="center">
                    <a href="/perfil?tab=compras" class="grey-text {{$textAccent}} valign-wrapper">
                        <i class="material-icons {{$iconColor}}">local_mall</i>
                        <h6><strong>Compras</strong></h6>
                    </a>
                </div>
            </div>
            <div class="col s4">
                <?php
                    if ($tab == "anuncios"){
                        $iconColor = "green-text text-darken-3";
                        $textAccent = "text-darken-3";
                    }
                    else {
                        $iconColor = "grey-text text-darken-1";
                        $textAccent = "text-darken-1";
                    }
                ?>
                <div class="center">
                    <a href="/perfil?tab=anuncios" class="grey-text {{$textAccent}} valign-wrapper">
                        <i class="material-icons {{$iconColor}}">attach_money</i>
                        <h6><strong>Anúncios</strong></h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 l8">
            @switch($tab)
                @case("conta")
                    <h5 class="green-text text-darken-3">Meus dados</h5>
                    <div class="row">
                        <div class="col s3 m2">
                            <strong class="right">Nome: </strong>
                        </div>
                        <div class="col s9 m10">
                            {{Auth::user()->nome}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3 m2">
                            <strong class="right">Email: </strong>
                        </div>
                        <div class="col s9 m10">
                            {{Auth::user()->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3 m2">
                            <strong class="right">Telefone: </strong>
                        </div>
                        <div class="col s9 m10">
                            ({{substr( Auth::user()->telefone , 0, 2 )}})
                            {{substr( Auth::user()->telefone , 2 )}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3 m2">
                            <strong class="right">CPF: </strong>
                        </div>
                        <div class="col s9 m10">
                            {{Auth::user()->cpf}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3 m2">
                            <strong class="right">Senha: </strong>
                        </div>
                        <div class="col s9 m10">
                            ********
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3 m2"></div>
                        <div class="col s9 m10">
                            <a class="left waves-effect waves-teal darken-4 btn-flat" href="/EditarCliente/{{Auth::user()->id}}">
                                <b>Editar</b> <i class="material-icons right">edit</i>
                            </a>
                        </div>
                    </div>
                    @break
                @case("compras")
                    <h5 class="green-text text-darken-3">Anúncios contratados</h5>
                    <div>
                        <ul>
                            @foreach ($compras as $compra)
                            <li>
                            <hr>
                                <?php
                                    $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($compra->anuncio_id);
                                    $sellerData = \App\Http\Controllers\ClienteController::getDadosCliente($adData["seller_id"]);
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
                                                    Total gasto: 
                                                    R$ {{ $compra->precoTotal }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l4">
                                                <strong>Vendedor: </strong>
                                                <a class='green-text text-darken-3' href='/vendedor/{{ $sellerData["client"]->id}}'>
                                                    {{ $sellerData["client"]->nome }}
                                                </a>
                                            </div>
                                            <div class="col s6 l5">
                                                <strong>Período: </strong>
                                                    {{ substr($compra->dataEntrada, 0, 10) }} - {{ substr($compra->dataSaida, 0, 10) }}
                                                </div>
                                            <div class="col s6 l3">
                                                <strong>Diária: R$</strong> {{ $adData['price'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @if (sizeof($compras) == 0)
                                <h2 class="valign-wrapper center">Você não realizou nenhuma compra</h2>
                            @endif
                            <span class='center'>
                                <!--TODO Incluir paginação aqui -->
                            </span>
                        </ul>
                    </div>
                    @break
                @case("anuncios")
                    <h5 class="green-text text-darken-3">Meus anúncios</h5>
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
                                            <div class="col s6 l5">
                                                <strong>Receita do anúncio: R$</strong> {{ number_format ( $adRevenue, 2, '.', '' ) }}
                                                <br>
                                                <a class='green-text text-darken-3' href='/vendas/{{$ad->id}}'>
                                                    Vendas deste anúncio
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @if (sizeof($ads) == 0)
                                <h2 class="valign-wrapper center">Você não possui anúncios cadastrados</h2>
                            @endif
                            <span class='center'>
                                <!--TODO Incluir paginação aqui -->
                            </span>
                        </ul>
                    </div>
                    @break
                @default
                    <h2 class="valign-wrapper center">ERRO 404!<br>Não pude encontrar este conteúdo</h2>
            @endswitch
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

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hospedagens</title>
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
                <?php
                //o projeto do banco precisaria ser revisto para se evitar esse tipo de coisa
                $type = 'Hospedagem';
                $isService = false;
                $ad = DB::table('anuncios')->where('id', $favorito->anuncio_id)->first();
                $lodging = DB::table('hospedagems')->where('anuncio_id', $favorito->anuncio_id)->first();
                if (empty($lodging)) {
                    $lodging = DB::table('servicos')->where('anuncio_id', $favorito->anuncio_id)->first();
                    $image = DB::table('imagem__servicos')->where('servico_id', $lodging->id)->first();
                    $isService = true;
                    $type = 'Servico';
                }
                else {
                    $image = DB::table('imagem__hospedagems')->where('hospedagem_id', $lodging->id)->first();
                }
                ?>
                <div class="row">
                    <div class="col s2 center">
                        <?php
                        try {
                            echo "
                            <a href='/Exibir$type/$lodging->id'>
                                <img class='centered-and-cropped' style='border-radius:0%' src='$image->imagem' width=150 height=150>
                            </a>
                            ";
                        }
                        catch(Exception $e) {
                            //imagem externa temporária para anúncios sem imagem cadastrada, precisa ser substituída futuramente
                            echo "
                            <a href='/Exibir$type/$lodging->id'>
                                <img class='centered-and-cropped' style='border-radius:0%'  src='https://blog.stylingandroid.com/wp-content/themes/lontano-pro/images/no-image-slide.png'
                                width=150 height=150>
                            </a>
                            ";
                        }
                        ?>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s9">
                        <div class="row">
                            <div class="col s8">
                                <a class='grey-text text-darken-2' href='/Exibir{{$type}}/{{$lodging->id}}'>
                                    @if ($isService)
                                    <h5>{{$lodging->nomeServico}}</h5>
                                    @else
                                    <h5>{{$lodging->nomePropriedade}}</h5>
                                    @endif
                                </a>
                            </div>
                            <div class="col s4">
                                <h5 class='right'>R$ {{$ad->preco}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            {{substr($ad->descricao, 0, 400)}}
                            @if (strlen($ad->descricao) > 400)
                                ...
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
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

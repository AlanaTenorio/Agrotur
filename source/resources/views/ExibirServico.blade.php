<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $servicos->nomeServiço }}</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<style>/*estilo do carrossel*/
    @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v18/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
    }

    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -moz-font-feature-settings: 'liga';
        -moz-osx-font-smoothing: grayscale;
    }

    .middle-indicator{
        position:absolute;
            top:50%;
        }
        .middle-indicator-text{
            font-size: 4.2rem;
        }
        a.middle-indicator-text{
            color:white !important;
        }
    .content-indicator{
        width: 64px;
        height: 64px;
        background: none;
        -moz-border-radius: 50px;
        -webkit-border-radius: 50px;
        border-radius: 50px;
    }
    .indicators{
        visibility: hidden;
    }
}
</style>

<body>
    <br><br>
    <section>
        <div class="row">
            <div class="col m1"></div>
            <div class="col s12 m10 l5 center">
                <div class="carousel carousel-slider center"><!-- fotos -->
                    <div class="left">
                        <br><br><br><br><br><br><br>
                        <a href="prev" class="movePrevCarousel middle-indicator-text waves-effect content-indicator">
                            <i class="material-icons left teal-text text-darken-3 middle-indicator-text">chevron_left</i>
                        </a>
                    </div>
                    <div class="right">
                        <br><br><br><br><br><br><br>
                        <a href="next" class=" moveNextCarousel middle-indicator-text waves-effect content-indicator">
                            <i class="material-icons right teal-text text-darken-3 middle-indicator-text">chevron_right</i>
                        </a>
                    </div>
                    @if ($anuncio->video != NULL)
                    <div class="carousel-item white-text">
                        <iframe width="580" height="400" src="{{ $anuncio->video }}"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    @endif
                    @foreach ($imagens as $imagem)
                    <div class="carousel-item white-text">
                        <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($imagem->imagem) }}" width="580" height="400">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col s12 m10 l5">
                @if (Auth::guard()->check() and Auth::user()->id == $anunciante->id)<!-- editar -->
                <div class="row">
                    <a class="right waves-effect waves-teal darken-4 btn-flat" href="/EditarServico/{{$servicos->id}}">
                        <b>Editar</b> <i class="material-icons right">edit</i>
                    </a>
                </div>
                @endif
                <div class="row">
                    <div class="col l1"></div>
                    <div class="col l10">
                        <h4>{{ $servicos->nomeServico }}</h4>
                    </div>
                    @if (Auth::guard()->check() and Auth::user()->id != $anunciante->id))
                    <div class="col l1">
                        <?php $favorito = \App\Favorito::where([
                            ['cliente_id', '=', Auth::user()->id],
                            ['anuncio_id', '=', $anuncio->id],
                        ])->first() ?>
                        <br>
                        @if ($favorito)
                        <form class="container" action="favoritos" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name = "user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name = "anuncio_id" value="{{$anuncio->id}}"/>
                            <button class="secondary-content btn-floating btn-flat" type="submit" name="action">
                                <i class="material-icons right teal-text text-darken-3">favorite</i>
                            </button>
                        </form>
                        @else
                        <form class="container" action="favoritos" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name = "user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name = "anuncio_id" value="{{$anuncio->id}}"/>
                            <button class="secondary-content btn-floating btn-flat" type="submit" name="action">
                                <i class="material-icons right teal-text text-darken-3">favorite_border</i>
                            </button>
                        </form>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col l1"></div>
                    <div class="col l11">
                        <h5 class='left'>Preço do serviço: R$ {{ $anuncio->preco }}</h5>
                        <?php
                            $ref = "/login";
                            if (Auth::guard()->check()) $ref = "/contratarAnuncio/".$anuncio->id;
                        ?>
                        @if (!Auth::guard()->check() or (Auth::guard()->check() and Auth::user()->id != $anunciante->id))
                        <a class="right waves-effect teal waves-teal darken-3 white-text btn-flat btn-large" href="{{$ref}}">
                            Reservar <i class="material-icons right">add_shopping_cart</i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col l1"></div>
                    <div class="col l11">
                        <b>Localização:</b>
                        <div class="row">
                            <div class="col s6">
                                <strong>Cidade:</strong> {{$endereco->cidade}}
                            </div>
                            <div class="col s6">
                                <strong>Estado:</strong> {{strtoupper($endereco->estado)}}
                            </div>
                            <div class="col s6">
                                <strong>Rua:</strong> {{$endereco->rua}}
                            </div>
                            <div class="col s6">
                                <strong>Número:</strong> {{$endereco->numero}}
                            </div>
                            <div class="col s12">
                                <strong>Bairro:</strong> {{$endereco->bairro}}
                            </div>
                            <div class="col s12">
                                <strong>CEP:</strong> {{$endereco->cep}}
                            </div>
                            <div class="col s12">
                                <strong>Complemento:</strong> {{$endereco->complemento}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <strong>Categoria:</strong> {{ $servicos->categoria}}
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col m1"></div>
            <div class="col m6">
                <div class="row green-text text-darken-3">
                    <h5>Descrição</h5>
                </div>
                <div class="row">
                    <p>{{ $anuncio->descricao }}</p>
                </div>
            </div>
            <div class="col m5"></div>
        </div>
    </section>

    <section>
        <div class="row">
          @if (Auth::guard()->check() and Auth::user()->id != $anunciante->id)
          <?php
           $transacao = \App\Transacao::where('anuncio_id', '=', $anuncio->id)->where('cliente_id', '=', Auth::user()->id)->first();
           $avaliacao = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $anuncio->id)->where('cliente_id', '=', Auth::user()->id)->first();
          ?>
          @if($transacao != NULL and $avaliacao == NULL)
            <div class="row">
                <div class="col m1"></div>
                <div class="col s12 m10">
                    <h5 class="green-text text-darken-3" >Avalie este anúncio</h5>
                    <div>
                        <form action="/avaliarAnuncio" method="post">
                            <div class="row">
                                <div class="input-field col s12 m9 l10">
                                    <label for="comentario">Comentário</label>
                                    <textarea id="comentario" class="materialize-textarea" name="comentario"></textarea>
                                </div>
                                <div class="col s12 m3 l2">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                                    <input type="hidden" name="anuncio_id" value="{{$anuncio->id}}"/>
                                    <div class="input-field"> <!--avaliação-->
                                        <select name="nota" id="nota" class="validate" required value={{old('nota')}}> {{ $errors->first('nota')}}
                                            <option value="" disabled selected>Avaliação</option>
                                            <option value="1">Péssimo</option>
                                            <option value="2">Ruim</option>
                                            <option value="3">Razoável</option>
                                            <option value="4">Bom</option>
                                            <option value="5">Muito bom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn-flat teal darken-3 white-text waves-effect waves-light center" type="submit" name="action" value="avaliar">
                                        Submeter
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col m1"></div>
            </div>
            @endif
            @endif

            <div class="row">
                <div class="col m1"></div>
                <div class="col s12 m10">
                    <div>
                        <h5 class="green-text text-darken-3" >Avaliações</h5>
                        <ul>
                            @if (sizeof($avaliacoes) == 0)
                                <li>Ainda não há avaliações para este anúncio.</li>
                            @else
                                @foreach ($avaliacoes as $avaliacao)
                                    <div class="row card-panel">
                                        <div class="col s12 m9 l10">
                                            "{{ $avaliacao->comentario }}"
                                        </div>
                                        <div class="col s12 m3 l2">
                                            <?php
                                                $nota = "";
                                                switch ($avaliacao->nota) {
                                                    case 1:
                                                        $nota = "Péssimo";
                                                        break;
                                                    case 2:
                                                        $nota = "Ruim";
                                                        break;
                                                    case 3:
                                                        $nota = "Razoável";
                                                        break;
                                                    case 4:
                                                        $nota = "Bom";
                                                        break;
                                                    case 5:
                                                        $nota = "Muito Bom";
                                                        break;
                                                    default:
                                                        $nota = "Não avaliado";
                                                }
                                            ?>
                                            <strong>Avaliação:</strong> {{$nota}}
                                        </div>
                                        <div class="col m11">
                                            <span class="">
                                                <?php
                                                    $c_id = (string) $avaliacao->cliente_id;
                                                    $user = DB::table('clientes')->where('id', $c_id)->first();
                                                ?>
                                                <b>&nbsp;&nbsp;&ndash; {{$user->nome}}</b>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col m1"></div>
            </div>
        </div>
    </section>
    
    <section>
        @include('layouts.Questions')
    </section>
</body>

@include('layouts.Footer')

<body><!--  Scripts Novamente, caminhos absolutos.-->
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

        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true,
            duration: 2000,
        });

        // move next carousel
        $('.moveNextCarousel').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $('.carousel').carousel('next');
        });

        // move prev carousel
        $('.movePrevCarousel').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $('.carousel').carousel('prev');
        });

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>

</html>

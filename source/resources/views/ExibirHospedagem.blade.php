<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $hospedagem->nomePropriedade }}</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>

   <!-- EXIBIÇÃO ANUNCIO -->

<body>
  <!--GALERIA -->
  <section class="slider">
    <ul class="slides">
      @foreach ($imagens as $i)
      <li>
        <img src="{{ asset($i->imagem) }}"/>
      </li>
      @endforeach
    </ul>
  </section>

  <!--INFORMAÇÕES DO LOCAL-->
  <section id="contact" class="section section-contact">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <ul class="collection with-header">
            <li class="collection-header light-green darken-3 white-text">
              <h4>{{ $hospedagem->nomePropriedade }} <h4>
            </li>
            <li class="collection-item">
              <i class="material-icons">location_on</i>
              Cidade: {{$endereco->cidade}} - {{$endereco->cep}} - {{$endereco->estado}} </br>
              Logradouro: {{$endereco->rua}}, Nº: {{$endereco->numero}}, {{$endereco->bairro}}
              {{$endereco->complemento}}
            </li>

            <ul>
              <li class="collection-item avatar">
                <img src="https://i.imgur.com/vF4bF8z.jpg" alt="" class="circle">
                <span class="title">Anfitrião/Empresa</span>
                 <p> Anunciante: {{ $anunciante->nome }} <br></p>
                <a href="#!" class="secondary-content">
                  <i class="material-icons">grade</i>
                </a>
              </li>
            </ul>

            <?php $favorito = \App\Favorito::where([
                ['cliente_id', '=', Auth::user()->id],
                ['anuncio_id', '=', $anuncio->id],
            ])->first() ?>

            @if ($favorito)
            <form class="container" action="favoritarOuDesfavoritar" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <input type="hidden" name = "user_id" value="{{Auth::user()->id}}"/>
              <input type="hidden" name = "anuncio_id" value="{{$anuncio->id}}"/>
              <button class="secondary-content" type="submit" name="action"><i class="material-icons">grade</i></button>
            </form>
            @else:
            <form class="container" action=favoritarOuDesfavoritar" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <input type="hidden" name = "user_id" value="{{Auth::user()->id}}"/>
              <input type="hidden" name = "anuncio_id" value="{{$anuncio->id}}"/>
              <button type="submit" name="action"><i class="material-icons">grade</i></button>
            </form>
            @endif

            <!--DESCRIÇÃO E SERVIÇOS-->

            <ul class="collection with-header">
              <li class="collection-header">
                <h5>Descrição</h5>
              </li>
              <li class="collection-item">
                <p>{{ $anuncio->descricao }}</p>
              </li>

              <ul class="collection with-header">
                  <li class="collection-header">
                    <h5>Serviços</h5>
                  </li>
                  <li class="collection-item">
                    <div class="col">
                        <ul class="collection with-header">

                          @foreach ($servicos as $s)
                            <li class="collection-item"> {{ $s->servico }} </li>
                          @endforeach
                          </ul>
                      </div>



                  </li>
            </ul>
          </ul>
        </div>

        <!-- FORM DE HOSPEDAGEM-->
        <div class="col s12 m6">
            <div class="card-panel light-green lighten-3">

              <li class="collection-header light-green darken-3 white-text">
                <h4>R$ {{ $anuncio->preco }} por dia</h4>
              </li>

                <h6>Check-in</h6>
                <div class="input-field">
                  <i class="material-icons prefix">date_range</i>
                  <input id="dataEntrada" type="text" class="datepicker">
                </div>

                <h6>Checkout</h6>
                <div class="input-field">
                  <i class="material-icons prefix">date_range</i>
                  <input id="dataSaida" type="text" class="datepicker2">
                </div>

                <div class="input-field col s12">
                  <input type="text" name="quantPessoas" class="form-control" id="quantPessoas"> <br/>
                  <label for="telefone">Quantidade de hóspedes</label>
                </div>

              <input type="submit" value="Próximo" class="btn light-green darken-3">
            </div>
          </div>
      </div>
    </div>


<nav>
  <div class="nav-wrapper light-green darken-3 center">
    <a href="" class="brand-logo">Mais opções</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="/EditarHospedagem/{{$hospedagem->id}}">Editar Hospedagem</a></li>
      <li><a href="/EditarImagensHospedagem/{{$hospedagem->id}}">Alterar Imagens</a></li>
     <li><a href="/EditarServicosHospedagem/{{$hospedagem->id}}">Alterar Serviços</a></li>
     <li><a href="/RemoverHospedagem/{{$hospedagem->id}}">Remover Hospedagem</a></li>
    </ul>
  </div>
</nav>


  <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

  <script>
    //Sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    //Slider de Imagens
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {
      indicators: true,
      height: 500,
      transition: 500,
      interval: 6000
    });

    //Date picker Check in
    const datepicker = document.querySelector('.datepicker');
    M.Datepicker.init(datepicker, {
      autoClose: true,
    });

    //Date picker Check out
    const datepicker2 = document.querySelector('.datepicker2');
    M.Datepicker.init(datepicker2, {
      autoClose: true,
    });

    //Quantidade de hóspedes
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, {});
  });

  </script>

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
    </script>

</body>

</html>

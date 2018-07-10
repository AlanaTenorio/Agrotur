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

<!--TODO Refatorar esse código!-->
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
              <h4>{{ $servicos->nomeServiço }} <h4>
            </li>
            <li class="collection-item">
              <i class="material-icons">location_on</i>
              Rua tal cep tal
            </li>

            <ul>
              <li class="collection-item avatar">
                <img src="img/hotel.jpg" alt="" class="circle">
                <span class="title">Anfitrião/Empresa</span>
                 <p> anunciante id: {{ $anuncio->anunciante_id }} <br></p>
                <a href="#!" class="secondary-content">
                  <i class="material-icons">grade</i>
                </a>
              </li>
            </ul>

            <!--DESCRIÇÃO E SERVIÇOS-->

            <ul class="collection with-header">
              <li class="collection-header">
                <h5>Descrição</h5>
              </li>
              <li class="collection-item">
                <p>{{ $anuncio->descriçao }} </p>
              </li>

          </ul>
        </div>

        <!-- FORM DE HOSPEDAGEM-->

        <div class="col s12 m6">
            <div class="card-panel light-green lighten-3">

              <li class="collection-header light-green darken-3 white-text">
                <h4>R$ {{ $servicos->preço }} por pessoa</h4>
              </li>

                <h6>Check-in</h6>
                <div class="input-field">
                  <i class="material-icons prefix">date_range</i>
                  <input id="icon_prefix" type="text" class="datepicker">
                </div>

                <h6>Checkout</h6>
                <div class="input-field">
                  <i class="material-icons prefix">date_range</i>
                  <input id="icon_prefix2" type="text" class="datepicker2">
                </div>

                <div class="input-field col s12">
                    <select>
                      <option value="" disabled selected>Quantidade de Hospedes</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>


              <input type="submit" value="Submit" class="btn light-green darken-3">
            </div>
          </div>
      </div>
    </div>

    <nav>
        <div class="nav-wrapper light-green darken-3 center">
            <a href="" class="brand-logo">Mais opções</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/EditarServico/{{$servicos->id}}">Editar Serviço</a></li>
            <li><a href="/EditarImagensServico/{{$servicos->id}}">Alterar Imagens</a></li>
            <li><a href="/RemoverServico/{{$servicos->id}}">Remover Serviço</a></li>
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

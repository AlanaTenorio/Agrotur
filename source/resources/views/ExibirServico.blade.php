<!doctype html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $servicos->nomeServiço }}</title>
    <!--caminho absoluto para o favicon-->
    <link rel="icon" id="icon_AgroTur" href="https://bit.ly/2z4Hf9o">
    <!-- CSS
    É mais conveniente usar caminhos absolutos.-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!--adicionar styles abaixo ao css do materialize ou criar um arquivo para estilos customizados-->
    <style>
        /*--------------------------------------------------------------------------------------
        Bloco para usar um sticky footer, se der problema no IE, usar um condicional de browser.
        */
        .page-footer.sticky-footer {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .page-footer.sticky-footer.main {
            flex: 1 0 auto;
        }

        /*----------------------------------------
        Footer fixo para dispositívos móveis
        ------------------------------------------*/
        .page-footer.footer-fixed {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .page-footer .container {
            padding: 0 15px;
        }

        #world-map-markers {
            height: 300px;
        }

        #polar-chart-holder {
            padding-top: 20px;
        }
    </style>
  </head>

  <body>
  <body><!--Navigation bar-->
    <div class="navbar-fixed hide-on-med-and-down">
        <nav class="white" role="navigation">
            <div class="nav-wrapper">
                <a id="logo-container" href="/view" class="brand-logo">
                    <!--Substituir por imagem do logo, quando houver um. Talvez manter texto e imagem-->
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <text class="green-text text-darken-3">Agro</text><text class="orange-text text-darken-3">Tur</text>
                </a>

                <ul class="right">
                    <li>
                        <!-- Dropdown Offer Service Trigger -->
                        <a class='waves-effect dropdown-button grey-text text-darken-3' href='#' data-target='dropdown_Search'>
                            <i class="large material-icons left">search</i>
                            PESQUISAR
                            <i class="large material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                    <li>
                        <!-- Dropdown Offer Service Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_OfferService'>OFERTAR UM SERVIÇO</a>
                        <!-- Dropdown Offer Service Structure -->
                        <ul id='dropdown_OfferService' class='dropdown-content'>
                            <!--Esse formato foi usado para manter a consistência da interface.-->
                            <li>
                                <a href="#!" class="black-text">Formatar a exibição para
                                    <br/> definir largura e altura
                                    <br/> quando já estiver implementado.</a>
                            </li>
                            <li>
                                <a href="#!" class="black-text">Textos intencionalmente visiveis</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <!-- Dropdown Usuario Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Favorites'>OPÇÕES USUÁRIOS</a>
                        <!-- Dropdown Favorites Structure -->
                        <ul id='dropdown_Favorites' class='dropdown-content'>
                            <li><a href="/cadastroCliente" class="black-text">Cadastrar Usuários</a></li>
                            <li><a href="/listaClientes" class="black-text">Gerenciar Usuários</a></li>
                        </ul>
                    </li>
                    <li>
                        <!-- Dropdown Favorites Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Favorites'>FAVORITOS</a>
                        <!-- Dropdown Favorites Structure -->
                        <ul id='dropdown_Favorites' class='dropdown-content'>
                            <li><a href="#!" class="black-text">Favorito 1</a></li>
                            <li><a href="#!" class="black-text">Favorito 2</a></li>
                            <li><a href="#!" class="black-text">Favorito 3</a></li>
                            <li><a href="#!" class="black-text">Favorito 4</a></li>
                            <li><a href="#!" class="black-text">Favorito 5</a></li>
                            <li><a href="#!" class="black-text">Formatar a exibição para<br/>
                                definir largura e altura<br/>
                                quando já estiver implementado.</a>
                            </li>
                            <li><a href="#!" class="black-text">Ver Todos</a></li>
                        </ul>
                    </li>

                    <li>
                        <!-- Dropdown Notifications Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Notifications'>NOTIFICAÇÕES</a>
                        <!-- Dropdown Notifications Structure -->
                        <ul id='dropdown_Notifications' class='dropdown-content'>
                            <li><a href="#!" class="black-text">Notificação 1</a></li>
                            <li><a href="#!" class="black-text">Notificação 2</a></li>
                            <li><a href="#!" class="black-text">Notificação 3</a></li>
                            <li><a href="#!" class="black-text">Notificação 4</a></li>
                            <li><a href="#!" class="black-text">Notificação 5</a></li>
                            <li><a href="#!" class="black-text">Formatar a exibição para<br/>
                                definir largura e altura<br/>
                                quando já estiver implementado.</a>
                            </li>
                            <li><a href="#!" class="black-text">Textos intencionalmente visiveis
                            <li><a href="#!" class="black-text center">Ver Todas</a></li>
                        </ul>
                    </li>

                    <li>
                        <!--testar substituir por um modal e um dropdown button-->
                        <!-- Dropdown Help Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Help'>AJUDA</a>
                        <!-- Dropdown Help Structure -->
                        <ul id='dropdown_Help' class='dropdown-content'>
                            <li><a href="#!" class="black-text">Perguntas Frequentes</a></li>
                            <li><a href="#!" class="black-text">Contato</a></li>
                            <li><a href="#!" class="black-text">Sobre o Agrotur</a></li>
                        </ul>
                    </li>

                    <li>
                        <!-- Dropdown Account Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Account'>
                            CONTA
                        </a>

                        <!-- Dropdown Account Structure -->
                        <ul id='dropdown_Account' class='dropdown-content'>
                            <li><a href="#!" class="black-text">Minha Conta</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="#!" class="black-text">Link 2</a></li>
                            <li><a href="#!" class="black-text">Link 3</a></li>
                            <li><a href="#!" class="black-text">
                                    Link 4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">view_module</i>
                                </a>
                            </li>
                            <li><a href="#!" class="black-text">Sair</a></li>
                        </ul>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>

            </div>
        </nav>
    </div>

    <div class="navbar-fixed hide-on-large-only">
        <nav class="teal darken-4" role="navigation">
            <div class="nav-wrapper">
                <a id="logo-container" href="#" class="brand-logo">
                    <!--Substituir por imagem do logo, quando houver um. Talvez manter texto e imagem-->
                    <text class="green-text text-darken-3">Agro</text>
                    <text class="orange-text text-darken-3">Tur</text>
                </a>
                <ul class="right">
                    <li>
                        <!-- Dropdown Offer Service Trigger -->
                        <a class='waves-effect dropdown-button grey-text text-darken-3' href='#' data-target='dropdown_Search'>
                            <i class="large material-icons right white-text">arrow_drop_down</i>
                            <i class="large material-icons right white-text">search</i>
                        </a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
        </nav>
    </div>

    <!--barra de busca
    <div class="navbar-fixed">
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
    </div>
    Adicionar quando o botão estiver pronto
    -->
</body>

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
        /* Caso a cor dos carrosséis for ser alterada (loembrar de apagar o cache do navegador)
        function blackCarrouselIndicators(){
            $('#carouselHome').carousel.indicators.indicator-item(
                {
                    'background-color':rgba(30, 30, 30, 0.5),
                }
            )
            $('#carouselHome').carousel.indicators.indicator-item.active(
                {
                    'background-color':rgba(10, 10, 10, 1),
                }
            )
        };*/
    </script>

</body>

  </html>

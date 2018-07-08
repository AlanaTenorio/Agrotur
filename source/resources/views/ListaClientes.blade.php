<!doctype html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LIsta de Usuários</title>
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

<!-- Listagem -->
 <div class="row center">
    <div class="col s12 m7">
        <ul class="collection with-header center">
            <li class="collection-header light-green darken-3 white-text">
                <h4>Usuários Cadastrados</h4>
            </li>
            <form class="col s12 m12">
                 <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <?php foreach ($clientes as $cliente){ ?>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"> <?php echo $cliente->nome ?> </th>
                            <th scope="col"><a href="/EditarCliente/{{$cliente->id}}">Editar</a></th>
                            <th scope="col"><a href="/RemoverCliente/{{$cliente->id}}">Remover</a></th>
                            </tr>
                        <?php } ?>
                        </thead>
                        </div>
                    </form>
                </ul>

        </div>
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

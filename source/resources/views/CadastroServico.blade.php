<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AgroTur - cadastrar anúncio</title>
    <!--caminho absoluto para o favicon-->
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png"><!--TODO corrigir isso-->
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

<!-- colocar cada body em um arquivo diferente para simplificar esse aqui -->
<body><!--Navigation bar-->
    <div class="navbar-fixed hide-on-med-and-down">
        <nav class="white" role="navigation">
            <div class="nav-wrapper">
                <a id="logo-container" href="#" class="brand-logo">
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

<body>
    <br/>
    <h4 class="container teal-text text-darken-3">Ofertar serviço</h4>
    <br/>
    <form class="container" action="cadastroServico" method="post">
        <input type="hidden" name = "provider_id" value="{{Auth::user()->id}}"/>
        <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
        <div class="row"> <!-- Título, preço e descrição -->
            <font size="5" class="row">
                Descrição:
            </font>
            <div class="input-field col s12"> <!--título-->
                <label class="active" for="service_title">Título do anúncio:</label>
                <input name="service_title" placeholder="Exemplo: " id="service_title" type="text" class="validate">
            </div>
            <div class="input-field col s12 m6 l4 left"> <!-- Preço -->
                <label class="active" for="service_price">Preço da diária:</label>
                <input name="service_price" placeholder="Valor em reais. Exemplo: 60.00" id="service_price" type="text" class="validate">
            </div>
            <div class="col s12 center"> <!-- Descrição -->
                <div class="row">
                    <div class="input-field col s12">
                        <label for="service_description">Descrição do anúncio:</label>
                        <textarea id="service_description" class="materialize-textarea" name="service_description"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!-- Endereço -->
            <font size="5" class="row">
                Endereço:
            </font>
            <div class="input-field col s12 m8 l9"> <!--cidade-->
                <input name="service_municipality" id="service_municipality" type="text" class="validate">
                <label class="active" for="service_municipality">Cidade:</label>
            </div>
            <div class="input-field col s12 m4 l3"> <!--estado-->
                <select name="service_state" id="service_state">
                    <option value="" disabled selected>Escolha o estado</option>
                    <option value="ac">Acre</option>
                    <option value="al">Alagoas</option>
                    <option value="ap">Amapá</option>
                    <option value="am">Amazonas</option>
                    <option value="ba">Bahia</option>
                    <option value="ce">Ceará</option>
                    <option value="df">Distrito Federal</option>
                    <option value="es">Espírito Santo</option>
                    <option value="go">Goiás</option>
                    <option value="ma">Maranhão</option>
                    <option value="mt">Mato Grosso</option>
                    <option value="ms">Mato Grosso do Sul</option>
                    <option value="mg">Minas Gerais</option>
                    <option value="pa">Pará</option>
                    <option value="pb">Paraíba</option>
                    <option value="pr">Paraná</option>
                    <option value="pe">Pernambuco</option>
                    <option value="pi">Piauí</option>
                    <option value="rj">Rio de Janeiro</option>
                    <option value="rn">Rio Grande do Norte</option>
                    <option value="rs">Rio Grande do Sul</option>
                    <option value="ro">Rondônia</option>
                    <option value="rr">Roraima</option>
                    <option value="sc">Santa Catarina</option>
                    <option value="sp">São Paulo</option>
                    <option value="se">Sergipe</option>
                    <option value="to">Tocantins</option>
                </select>
                <label>Estado</label>
            </div>
            <div class="input-field col s12 l9"> <!-- rua -->
                <label class="active" for="service_street">Rua:</label>
                <input name="service_street" id="service_street" type="text" class="validate">
            </div>
            <div class="input-field col s12 l3"> <!-- número -->
                <label class="active" for="service_street_number">Número:</label>
                <input name="service_street_number" id="service_street_number" type="text" class="validate">
            </div>
            <div class="input-field col s12"> <!-- bairro -->
                <label class="active" for="service_neighbourhood">Bairro:</label>
                <input name="service_neighbourhood" id="service_neighbourhood" type="text" class="validate">
            </div>
            <div class="input-field col s12 m6"> <!-- CEP -->
                <label class="active" for="service_postal_code">CEP:</label>
                <input name="service_postal_code" id="service_postal_code" type="text" class="validate">
            </div>
            <div class="input-field col s12"> <!-- bairro -->
                <label class="active" for="service_address_complement">Complemento:</label>
                <input name="service_address_complement" id="service_address_complement" type="text" class="validate">
            </div>
        </div>

        <div class="row">
            <!-- Imagens e link do YouTube -->
            <font size="5" class="row">
                Mídia:
            </font>
            <br/>
            <div class="row"><!--imagens-->
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <button class="btn-flat" type="button" name="action">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-field col s12"> <!-- YouTube video -->
                <label class="active" for="service_video">Link para vídeo no YouTube:</label>
                <input name="service_video" id="service_video" type="text" class="validate">
            </div>
        </div>

        <div class="row center"><!--usar disabled num if enquanto tudo não estiver preenchido-->
            <button class="btn-large waves-effect waves-light" type="submit" name="action">Cadastrar
                <i class="material-icons right">send</i>
            </button>
        </div>
        <!--<input type="submit" value="proximo" />-->
        
    </form>

</body>


<body><!--toolbar mobile-->
    <div class="fixed-action-btn toolbar hide-on-large-only"><!--modificar ícones para adicionar texto abaixo deles-->
        <a class="btn-floating btn-large teal darken-4">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">add</i><!--criar um ícone juntando o add ao home-->
                </a>
            </li>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">favorites</i>
                </a>
            </li>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">notifications</i>
                </a>
            </li>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">help</i>
                </a>
            </li>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">person</i>
                </a>
            </li>
            <li>
                <a class="btn-floating teal darken-4">
                    <i class="material-icons">close</i>
                </a>
            </li>
        </ul>
    </div>
</body>

<body><!--Footer Desktop-->

    <footer class="page-footer teal darken-4 sticky-footer.main">
        <div class="container">
            <div class="row">
                <div class="col l4 xl4 m6 s12"><!--mantendo os limitadores para celulares pra situações adversas-->
                    <h5 class="white-text">Agrotur</h5>
                    <ul>
                        <li>
                            <a class="white-text" href="#!">Sobre a Agrotur</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 2</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 3</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 4</a>
                        </li>
                    </ul>


                </div>
                <div class="col l4 xl4 m6 s12">
                    <h5 class="white-text">Lista de links 1</h5>
                    <ul>
                        <li>
                            <a class="white-text" href="#!">Link 1</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 2</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 3</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col l4 xl4 m6  s12">
                    <h5 class="white-text">Lista de links 2</h5>
                    <ul>
                        <li>
                            <a class="white-text" href="#!">Link 1</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 2</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 3</a>
                        </li>
                        <li>
                            <a class="white-text" href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &nbsp;&nbsp;&nbsp;&nbsp;Agrotur 2018
            </div>
        </div>
    </footer>
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
        $(document).ready(function () {
            $('select').formSelect();
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
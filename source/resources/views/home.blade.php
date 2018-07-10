<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AgroTur</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    
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
    </style>
</head>

<body><!--Navigation bar-->
    <div class="navbar-fixed hide-on-med-and-down">
        <nav class="white" role="navigation">
            <div class="nav-wrapper">
                <a id="logo-container" href="{{ route('home') }}" class="brand-logo">
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
                                <a href="{{ route('cadastro_hospedagem') }}" class="black-text">Ofertar Hospedagem</a>
                            </li>
                            <li>
                                <a href="{{ route('cadastro_servico') }}" class="black-text">Ofertar Serviço</a>
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
                        @if(Auth::guard()->check())
                        <!-- Dropdown Account Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Account'>
                            <b>{{Auth::user()->nome}}</b>
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
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="center-align black-text">
                                        <p>
                                        <button type="submit"class="waves-effect waves-light btn-flat"><b>SAIR</b></button>
                                        </p>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        @else
                        <li>
                        <!-- Dropdown Offer Service Trigger -->
                        <a class='waves-effect dropdown-button grey-text text-darken-3' href="{{ route('login') }}"
                         data-target='dropdown_Login'>
                            ENTRAR
                        </a>
                    </li>
                        @endif
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

<body><!--locais próximos-->
    <div class="grey lighten-4 hide-on-med-and-down">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <h4>
                <span class="left grey-text text-darken-3">
                    &nbsp;Perto de você
                </span>
            </h4>
        </div>
        <!--esse código todo será gerado automaticamente-->
        <div class="row container">
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row container">
            <h5>
                <a href="#" class="green-text text-darken-3">&nbsp;&nbsp;Ver mais</a>
                <br/>
            </h5>
        </div>
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
    </div>
    
    <div class="orange accent-4 hide-on-large-only">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <h4>
                <span class="left white-text text-darken-3">
                    &nbsp;Perto de você
                </span>
            </h4>
        </div>
    
        <div class="carousel" id="carouselHome">
            <div class="carousel-item black-text" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
    </div>
</body>

<body><!--categorias (o que você busca)-->
    <div class="grey lighten-4 hide-on-med-and-down">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <br/>
            <h4>
                <span class="left grey-text text-darken-3">
                    &nbsp;O que você busca?
                </span>
            </h4>
        </div>
        <!--esse código todo será gerado automaticamente-->
        <div class="row container">
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
    </div>

    
    <!--categorias (o que você busca)-->
    <div class="orange accent-4 hide-on-large-only">
            <span class="grey-text text-lighten-4">
                <hr/>
            </span>
            <div class="row container">
                <h4>
                    <span class="left white-text text-darken-3">
                        &nbsp;O que você busca?
                    </span>
                </h4>
            </div>
    
            <div class="carousel" id="carouselHome">
                <div class="carousel-item black-text" style="height:400px !important; width:300px !important;">
                    <div class="card">
                            <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height:400px !important; width:300px !important;">
                    <div class="card">
                            <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height:400px !important; width:300px !important;">
                    <div class="card">
                        <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height:400px !important; width:300px !important;">
                    <div class="card">
                            <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height:400px !important; width:300px !important;">
                    <div class="card">
                        <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height:400px !important; width:300px !important;">
                    <div class="card">
                            <div class="card-image">
                            <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Tipo de experiência
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>
                            </span>
                            <p>
                                Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                                texto texto texto texto texto.
                            </p>
                            <p>
                                <a href="#" class=" green-text text-darken-3">
                                    <b>Visitar</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <span class="grey-text text-lighten-4">
                <hr/>
            </span>
        </div>
</body>

<body><!--recomendado-->
    <div class="grey lighten-4 hide-on-med-and-down">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <h4>
                <span class="left grey-text text-darken-3">
                    &nbsp;Recomendado
                </span>
            </h4>
        </div>
        <!--esse código todo será gerado automaticamente-->
        <div class="row container">
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            Introdução rápida
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#">Visitar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row container">
            <h5>
                <a href="#" class="green-text text-darken-3">&nbsp;&nbsp;Ver mais</a>
                <br/>
            </h5>
        </div>
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
    </div>
    
    <div class="orange accent-4 hide-on-large-only">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <h4>
                <span class="left white-text text-darken-3">
                    &nbsp;Recomendado
                </span>
            </h4>
        </div>
    
        <div class="carousel" id="carouselHome">
            <div class="carousel-item black-text" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:400px !important; width:300px !important;">
                <div class="card">
                    <div class="card-image">
                        <img class="activator" src="https://i.imgur.com/vF4bF8z.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nome da oferta
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            Resumo curto da oferta, texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto.
                        </p>
                        <p>
                            <a href="#" class=" green-text text-darken-3">
                                <b>Visitar</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
    </div>
</body>

<body> <!--mobile toolbar -->
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
  
</html>
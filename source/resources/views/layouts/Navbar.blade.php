<style>
.centered-and-cropped { object-fit: cover }
</style>

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
                    @if(Auth::guard()->check())
                    <li>
                        <?php
                        $favoritos = \App\Favorito::where('cliente_id', '=', Auth::user()->id)->limit(3)->get();
                        ?>
                        <!-- Dropdown Favorites Trigger -->
                        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Favorites'>FAVORITOS</a>
                        <!-- Dropdown Favorites Structure -->
                        <ul id='dropdown_Favorites' class='dropdown-content'>
                            @foreach ($favoritos as $favorito)
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
                            <li>
                                <a class='grey-text text-darken-2' href='/Exibir{{$type}}/{{$lodging->id}}'>
                                    <div class="row">
                                        <div class="left col s3">
                                            <?php
                                            try {
                                                echo "<img class='centered-and-cropped' style='border-radius:0%' src='$image->imagem' width=75 height=75>";
                                            }
                                            catch(Exception $e) {
                                                //imagem externa temporária para anúncios sem imagem cadastrada, precisa ser substituída futuramente
                                                echo "<img class='centered-and-cropped' style='border-radius:0%'  src='https://blog.stylingandroid.com/wp-content/themes/lontano-pro/images/no-image-slide.png'
                                                    width=75 height=75>";
                                            }
                                            ?>
                                        </div>
                                        <div class='col s9 right'>
                                            <ul>
                                                <li>
                                                    <b>
                                                        @if ($isService)
                                                            {{substr($lodging->nomeServico, 0, 32)}}
                                                            @if (strlen($lodging->nomeServico) > 32)
                                                            ...
                                                            @endif
                                                        @else
                                                        {{substr($lodging->nomePropriedade, 0, 32)}}
                                                            @if (strlen($lodging->nomePropriedade) > 32)
                                                            ...
                                                            @endif
                                                        @endif
                                                    </b>
                                                </li>
                                                <li>
                                                    {{substr($ad->descricao, 0, 57)}}
                                                    @if (strlen($ad->descricao) > 57)
                                                    ...
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            <li><a href="{{ route('listarFavoritos') }}" class="black-text center">Ver Todos</a></li>
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
                    @endif

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
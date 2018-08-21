
<body><!--recomendado-->
    <div class="grey lighten-4 hide-on-med-and-down">
        <span class="grey-text text-lighten-4">
            <hr/>
        </span>
        <div class="row container">
            <h4>
                <span class="left grey-text text-darken-3">
                    &nbsp;Experiências Recomendadas
                </span>
            </h4>
        </div>

        <!--esse código todo será gerado automaticamente-->
        <div class="row container">
          @foreach ($recomendados as $recomendado)
            <?php $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($recomendado->id);?>

            <div class="col s06 m3 l3 xl3">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                      <a href="/Exibir{{ $adData['type'] }}/{{ $adData['id'] }}">
                          <img class="centered-and-cropped" style="border-radius:0%" src="{{ $adData['image'] }}" width=150 height=150>
                      </a>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                          {{ $adData['title'] }}
                          <i class="material-icons right">more_vert</i>
                        </span>
                        <p>
                           R$: {{ $adData['price'] }}
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons right">close</i>
                        </span>
                        <p>
                            {{ $adData['description'] }}
                        </p>
                    </div>
                </div>
            </div>
          @endforeach
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

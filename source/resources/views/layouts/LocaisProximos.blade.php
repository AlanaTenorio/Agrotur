<body><!--locais próximos-->
  <?php $anunciosProx = \App\Http\Controllers\AnuncioController::getAnunciosProximos() ?>
  @if (!empty($anunciosProx['anuncios']))
    <div class="grey lighten-4 hide-on-med-and-down">
      <span class="grey-text text-lighten-4">
          <hr/>
      </span>
        <div class="row container">
            <h4>
                <span class="left grey-text text-darken-3">
                    &nbsp;Lugares próximos de {{ $anunciosProx['cidade'] }} - {{ $anunciosProx['estado'] }}
                </span>
            </h4>
        </div>
        <!--esse código todo será gerado automaticamente-->
        <div class="row container">
          @foreach ($anunciosProx['anuncios'] as $anuncio)
            <?php $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($anuncio->id) ?>

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
  @endif
</body>

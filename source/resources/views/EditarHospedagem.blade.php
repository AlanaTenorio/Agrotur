<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AgroTur</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
    <h1>Editar Hospedagem</h1>

        <form action="/SalvarHospedagem" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $hospedagem->id}}" />
            Nome da propriedade: <input type="text" name="nomePropriedade" value="{{$hospedagem->nomePropriedade}}"><br/>
            Preço diaria: <input type="text" name="preco" value="{{$anuncio->preco}}"><br/>
            Anuncio ID: <input type="text" name="anuncio_id" value="{{$hospedagem->anuncio_id}}"><br/>

            Descricao: <input type="text" name="descricao" value="{{$anuncio->descricao}}"><br/>
            Anunciante id: <input type="text" name="anunciante_id" value="{{$anuncio->anunciante_id}}"><br/>

            <input  type="submit" value="alterar" />
        </form>

</body>

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

@include('layouts.Footer')

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

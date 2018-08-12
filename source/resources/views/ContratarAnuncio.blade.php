<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contratar Anúncio</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

  <body>
    <br/>
    <h4 class="container teal-text text-darken-3">Reserva</h4>
    <br/>
    <form class="container" action = "/salvarTransacao" method = "post">
        <input type="hidden" name = "cliente_id" value="{{Auth::user()->id}}"/>
        <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
        <div class="row"> <!-- Check in, checkout, Quantidade de Hospedes-->
            <font size="5" class="row">
                Dados:
            </font>
            <input type="hidden" name = "anuncio_id" value="{{ $id }}"/>

            <div class="input-field col s12 m6 l4 left"> <!-- Data entrada -->
                Data de entrada: <input name="dataEntrada" id="dataEntrada" type="date" class="validate" required value={{ old('dataEntrada')}}> {{ $errors->first('dataEntrada')}}
            </div>
            <div class="input-field col s12 m6 l4 left"> <!-- Data saida-->
                Data de saída: <input name="dataSaida" id="dataSaida" type="date" class="validate" required value={{ old('dataSaida')}}> {{ $errors->first('dataSaida')}}
            </div>
            <div class="input-field col s12"> <!--Quantidade-->
                Quantidade de Pessoas: <input name="quantPessoas" id="quantPessoas" type="text" class="validate" required value={{ old('quantPessoas')}}> {{ $errors->first('quantPessoas')}}
            </div>

        </div>

        <div class="row center"><!--usar disabled num if enquanto tudo não estiver preenchido-->
            <button class="btn-large waves-effect waves-light light-green darken-3" type="submit" name="action">Efetuar Pagamento
                <i class="material-icons right">send</i>
            </button>
        </div>
        <!--<input type="submit" value="proximo" />-->

    </form>

</body>

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

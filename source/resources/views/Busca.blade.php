<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - busca</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<style>
.centered-and-cropped { object-fit: cover }
.small-input-field { width: 60px; }
</style>


<body>
    <!--adicionada temporariamente aqui, será removida quando estiver pronta na navbar-->
    <nav class="white">
        <div class="nav-wrapper container">
            <form class="container" action="/ExibirBusca" method="post">
            <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
              <div class="input-field">
                <label class="label-icon" for="search">
                        <i class="material-icons grey-text">search</i>
                </label>
                <input type="text" name='termo' class="white grey-text autocomplete" id="autocomplete-input" placeholder="       o que você está buscando?">
                <button class="btn-large waves-effect waves-light orange" type="submit" name="action">Pesquisar
                        <i class="material-icons right">send</i>
                </button>


              </div>
          </form>
        </div>
    </nav>



    <br><br><br>

    <div class="row">
        <div class="col l3 hide-on-med-and-down">
            <form class="container" action="/ExibirBusca" method="post">
            <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
                <div class="container">
                    <div class="row">
                        <p>
                            <h5>Filtros</h5>
                        </p>
                    </div>
                    <div class="row">
                        <h6>Localização</h6>
                            <select name="termo" id="lodging_state" class="validate" value= {{ old('lodging_state')}}> {{ $errors->first('lodging_state')}}
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
                    </div>
                    <div class="row">
                        <h6>Preço</h6>
                            <select name="termo2" id="lodging_price" class="validate" value= {{ old('lodging_price')}}> {{ $errors->first('lodging_price')}}
                                 <option value="" disabled selected>Faixa de preço</option>
                                <option value="0">Até R$100</option>
                                <option value="1">R$101 a R$200</option>
                                <option value="2">R$201 a R$300</option>
                                <option value="3">R$301 a R$401</option>
                                <option value="4">Acima de 400</option>
                            </select>
                    </div>

                </div>
                <button class="btn-large waves-effect waves-light orange text-darken-2" type="submit" name="action">Filtrar
                        <i class="material-icons right">send</i>
                </button>
            </form>
        </div>



        
    </div>


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
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>

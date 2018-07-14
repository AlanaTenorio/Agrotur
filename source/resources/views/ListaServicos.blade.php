<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrotur - Serviços</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
<!-- Listagem -->
    <div class="row center">
        <div class="col s12 m7">
            <ul class="collection with-header center">
                <li class="collection-header light-green darken-3 white-text">
                    <h4>Serviços</h4>
                </li>
                <li>
                    <form class="col s12 m12">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    @foreach ($servicos as $servico)
                                    <tr>
                                        <th scope="col"><i class="material-icons">landscape</i></th>
                                        <th scope="col"> {{$servico->nomeServico}} </th>
                                        <th scope="col"><a href="/ExibirServico/{{$servico->id}}">Visualizar</a></th>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </form>
                </li>
            </ul>
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

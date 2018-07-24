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
</style>


<body>
    <!--adicionada temporariamente aqui, será removida quando estiver pronta na navbar-->
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

    <br><br><br>

    <div class="row">
        <div class="col l3 hide-on-med-and-down">
            <div class="container">
                <div class="row">
                    iooooooooo iiiiiiiiiiii i iiiiiiiiiiiiii iiiiiiiiiiii iiiiiiiiiiiiiiiii iiiiiiiiiiiii iiiiiiiiiiiiii iiiiiiiiiiii ob_clean
                    iiiiiiiii iiiiiiiiii iiiiiiiiii i9iiiiiiiii iiiiiiiii iiiiiiiii iiiiiiiiiiii iiiiiiiiiii iiiiiiiiiiiii
                </div>
            </div>
        </div>
        <div class="col s12 l8">
            <div class="row">
                    iooooooooo iiiiiiiiiiii i iiiiiiiiiiiiii iiiiiiiiiiii iiiiiiiiiiiiiiiii iiiiiiiiiiiii iiiiiiiiiiiiii iiiiiiiiiiii ob_clean
                    iiiiiiiii iiiiiiiiii iiiiiiiiii i9iiiiiiiii iiiiiiiii iiiiiiiii iiiiiiiiiiii iiiiiiiiiii iiiiiiiiiiiii
                    iooooooooo iiiiiiiiiiii i iiiiiiiiiiiiii iiiiiiiiiiii iiiiiiiiiiiiiiiii iiiiiiiiiiiii iiiiiiiiiiiiii iiiiiiiiiiii ob_clean
                    iiiiiiiii iiiiiiiiii iiiiiiiiii i9iiiiiiiii iiiiiiiii iiiiiiiii iiiiiiiiiiii iiiiiiiiiii iiiiiiiiiiiii
                    iooooooooo iiiiiiiiiiii i iiiiiiiiiiiiii iiiiiiiiiiii iiiiiiiiiiiiiiiii iiiiiiiiiiiii iiiiiiiiiiiiii iiiiiiiiiiii ob_clean
                    iiiiiiiii iiiiiiiiii iiiiiiiiii i9iiiiiiiii iiiiiiiii iiiiiiiii iiiiiiiiiiii iiiiiiiiiii iiiiiiiiiiiii
            </div>
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
    </script>
</body>

</html>

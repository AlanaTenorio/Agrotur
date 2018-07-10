<!doctype html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro usuário</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

    <!--
        TODO O layout pode ser revisto.
        Aproveitar melhor o espaço da tela, centralizar melhor os itens, deixar mais simétrico.
    -->

@include('layouts.Navbar')

<body>
  

   <!-- FORMULÁRIO CADASTRO CLIENTE -->
    <section id="contact" class="section section-contact">
      <form action = "cadastroCliente" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      <form class="needs-validation" novalidate>
        <div class="row center">
            <div class="col s12 m7">
                <ul class="collection with-header center">
                    <li class="collection-header light-green darken-3 white-text">
                        <h4>Cadastro Usuário</h4>
                    </li>
                    <form class="col s12 m10">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="nome" class="form-control" id="nome"required value= {{ old('nome')}}> {{ $errors->first('nome')}} <br/>
                                <label for="nome">Nome</label>

                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input type="email" class="validate" name="email" class="form-control" id="email" value={{ old('email')}}> {{ $errors->first('email')}} <br/>
                                <label for="email">Email</label>

                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">phone</i>
                                <input type="tel" name="telefone" class="form-control" id="telefone" required value={{ old('telefone')}}> {{ $errors->first('telefone')}} <br/>
                                <label for="telefone">Telefone</label>

                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">recent_actors</i>
                                <input type="text" name="cpf" class="form-control" id="cpf" required value={{ old('cpf')}}> {{ $errors->first('cpf')}} <br/>
                                <label for="cpf">CPF</label>

                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name = "senha" class="form-control" id="senha" required value={{ old('senha')}}> {{ $errors->first('senha')}} <br/>
                                <label for="senha">Senha</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name = "senha_confirmation" class="form-control" id="senha_Confirmation" required>
                                <label for="senha_Confirmation">Confirme a senha</label>
                            </div>
                        </div>
                    </form>

            </div>
            <div class="col s6">
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block btn-large light-green darken-3 center" type="submit">Cadastrar Usuário</button>
            </div>
            </div>
        </div>

    </section>
</body>

@include('layouts.Footer')

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
    </script>

</body>

</html>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Usuário</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
    <section id="contact" class="section section-contact">
        <div class="container">
            <h4 class="green-text text-darken-3">Alterar dados do perfil</h4>
            <form class="needs-validation" action = "/SalvarCliente" method = "post" novalidate>
                <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
                <input type="hidden" name="id" value="{{$cliente->id}}" />
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name = "nome" class="form-control" id="nome" required value="{{$cliente->nome}}"> {{ $errors->first('nome')}} <br/>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">recent_actors</i>
                        <input type="text" disabled name="cpf" class="form-control" id="cpf" required value="{{$cliente->cpf}}"> {{ $errors->first('cpf')}} <br/>
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" class="form-control" id="email" value="{{$cliente->email}}"> {{ $errors->first('email')}} <br/>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="telefone" class="form-control" id="telefone"required value="{{Auth::user()->telefone}}"> {{ $errors->first('telefone')}} <br/>
                        <label for="telefone">Telefone</label>

                    </div>
                </div>

                <h6 class="green-text text-darken-3">Alterar senha</h6>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name = "senha_atual" class="form-control" id="senha_atual"> {{ $errors->first('senha')}} <br/>
                        <label for="senha_atual">Senha atual</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_open</i>
                        <input type="password" name="nova_senha" class="form-control" id="nova_senha"> {{ $errors->first('nova_senha')}} <br/>
                        <label for="nova_senha">Nova senha</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" name="nova_senha_confirmation" class="form-control"
                         id="nova_senha_confirmation" required> <br/>
                        <label for="nova_senha_confirmation">Confirme a nova senha</label>
                    </div>
                </div>

                <div class="center">
                    <button class="btn green darken-4 waves-effect waves-green" type="submit">
                        <strong>Salvar</strong>
                    </button>
                </div>
            </form>
        </div>
        <br><br><br>
    </section>
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

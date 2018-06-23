<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <title>Cadastrar Cliente</title>
  </head>
  <body>
    
    @if (count($errors) > 0)
       <div class = "alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif

    <!-- <?php
       // echo Form::open(array('url'=>'/validation'));
    // ?> -->

    <h1>Cadastrar Cliente</h1>
    <form action = "cadastroCliente" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      Nome: <input type = "text" name = "nome" ><br/>
      Senha: <input type = "text" name = "senha" ><br/>
      Telefone: <input type = "text" name = "telefone" ><br/>
      CPF: <input type = "text" name = "cpf" ><br/>
      Email: <input type = "text" name = "email" ><br/>
      <input type="submit" value="cadastrarCliente" />
    </form>

    <!-- <?php
        // echo Form::close();
    // ?> -->

  </body>
  </html>

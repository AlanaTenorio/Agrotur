<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <title>Cadastrar Cliente</title>
  </head>
  <body>

    <h1>Cadastrar Cliente</h1>
    <form action = "cadastroCliente" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      Nome: <input type = "text" name = "nome" value={{ old('nome')}}> {{ $errors->first('nome')}} <br/>
      Senha: <input type = "text" name = "senha" value={{ old('senha')}}> {{ $errors->first('senha')}} <br/>
      Telefone: <input type = "text" name = "telefone" value={{ old('telefone')}}> {{ $errors->first('telefone')}} <br/>
      CPF: <input type = "text" name = "cpf" value={{ old('cpf')}}>  {{ $errors->first('cpf')}} <br/>
      Email: <input type = "text" name = "email" value={{ old('email')}}> {{ $errors->first('email')}} <br/>
      <input type="submit" value="cadastrarCliente" />
    </form>

  </body>
  </html>

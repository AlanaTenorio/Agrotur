<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
    	<h1>Confirmar Remover Cliente</h1>

    	<form action="/ApagarCliente" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $cliente->id}}" />
        Nome: <input type="text" disabled="disabled" name="nome" value="{{$cliente->nome}}"><br/>
        Senha: <input type="text" disabled="disabled" name="senha" value="{{$cliente->senha}}"><br/>
        Telefone: <input type="text" disabled="disabled" name="telefone" value="{{$cliente->telefone}}"><br/>
        Cpf: <input type="text" disabled="disabled" name="cpf" value="{{$cliente->cpf}}"><br/>
        Email: <input type="text" disabled="disabled" name="email" value="{{$cliente->email}}"><br/>
        <input  type="submit" value="remover" />
      </form>

    </body>
</html>

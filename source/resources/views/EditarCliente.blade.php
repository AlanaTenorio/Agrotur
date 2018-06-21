<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
    	<h1>Editar Cliente</h1>

    	<form action="/SalvarCliente" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="hidden" name="id" value="{{ $cliente->id}}" />
    			Nome: <input type="text" name="nome" value="{{$cliente->nome}}"><br/>
    			Senha: <input type="text" name="senha" value="{{$cliente->senha}}"><br/>
    			Telefone: <input type="text" name="telefone" value="{{$cliente->telefone}}"><br/>
          Cpf: <input type="text" name="cpf" value="{{$cliente->cpf}}"><br/>
          Email: <input type="text" name="email" value="{{$cliente->email}}"><br/>
    			<input  type="submit" value="alterar" />
    	</form>

    </body>
</html>

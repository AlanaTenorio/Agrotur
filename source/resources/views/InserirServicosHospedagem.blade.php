<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
    	<h1>inserir imagens</h1>

    	<form action="/salvarServicosOferecidos" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          Serviço: <input type="text" name = "servico"/> <br/>
          <input type="submit" name="enviar" value="ENVIAR"/>
          <a href="/cadastroHospedagem">cadastrar outra hospedagem</a>
    	</form>

    </body>
</html>

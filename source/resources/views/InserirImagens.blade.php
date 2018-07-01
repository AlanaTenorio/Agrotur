<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
    	<h1>inserir imagens</h1>

    	<form action="/salvarImagem" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          <input type="file" name="imagem" multiple/>
          <input type="submit" name="enviar" value="ENVIAR"/>
          <a href="/InserirServicosHospedagem/{{$hospedagem->id}}">Proxima</a>
    	</form>

    </body>
</html>

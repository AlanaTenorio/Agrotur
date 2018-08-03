<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>
    </head>
    <body>
    	<h1>Editar Cliente</h1>
    	<form action="/avaliarAnuncio" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			id_cliente: <input type="text" name="cliente_id"><br/>
    			id_anuncio: <input type="text" name="anuncio_id"><br/>
    			nota: <input type="text" name="nota"><br/>
          comentário: <input type="text" name="comentario"><br/>
    			<input  type="submit" value="avaliar" />
    	</form>
    </body>
</html>

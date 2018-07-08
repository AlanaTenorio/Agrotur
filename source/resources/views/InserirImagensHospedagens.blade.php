<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <title>Agortur</title>
    </head>
    <body>
    	<h1>Imagens</h1>

    	<form action="/SalvarImagemHospedagem" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          <input type="file" id="primaryImage" name="primaryImage" accept="image/*" />
          <input type="submit" name="enviar" value="ENVIAR"/>
          <a href="/InserirServicosHospedagem/{{$hospedagem->id}}">Proxima</a>
    	</form>

    </body>
</html>

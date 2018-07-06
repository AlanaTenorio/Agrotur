<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <title>Hello</title>
    </head>
    <body>
    	<h1>inserir imagens</h1>
    	<form action="/SalvarImagemServico" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="hidden" name="serviço_id" value="{{ $serviço->id}}" />
          <input type="file" name="primaryImage" multiple/>
          <input type="submit" name="enviar" value="ENVIAR"/>
          <a href="/cadastroServico">cadastrar outro serviço</a>
    	</form>
    </body>
</html>

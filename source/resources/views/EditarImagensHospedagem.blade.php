<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <title>Agrotur</title>
    </head>
    <body>
    	<h1>Editar imagens</h1>

    	  @foreach ($imagens as $i)
          <img src="{{ asset($i->imagem) }}"/><br>
          <a href="/RemoverImagemHospedagem/{{$i->id}}">Remover</a><br>
        @endforeach

        <br>

        <form action="/SalvarImagemHospedagem" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          <input type="file" id="primaryImage" name="primaryImage" accept="image/*" />
          <input type="submit" name="enviar" value="ENVIAR"/>
        </form>

        <br><a href="/ExibirHospedagem/{{ $hospedagem->id }}">Voltar</a><br>
    </body>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <title>Agrotur</title>
    </head>
    <body>
    	<h1>Editar imagens</h1>

    	  @foreach ($imagens as $i)
          <img src="{{ asset($i->imagem) }}"/><br>
          <a href="/RemoverImagemServico/{{$i->id}}">Remover</a><br>
        @endforeach

        <br>

        <form action="/SalvarImagemServico" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="serviço_id" value="{{ $servico->id}}" />
          <input type="file" id="primaryImage" name="primaryImage" accept="image/*" />
          <input type="submit" name="enviar" value="ENVIAR"/>
        </form>

        <br><a href="/ExibirServico/{{ $servico->id }}">Voltar</a><br>
    </body>
</html>

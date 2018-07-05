<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <title>Agrotur</title>
    </head>
    <body>
    	<h1>Editar imagens</h1>

        <p> serviços oferecidos: </p>
        @foreach ($servicos as $s)
          <p> {{ $s->serviço }} <a href="/RemoverServicosHospedagem/{{$s->id}}">Remover</a></p>
        @endforeach

        <form action="/salvarServicosOferecidos" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          Serviço: <input type="text" name = "servico"/> <br/>
          <input type="submit" name="enviar" value="ENVIAR"/>
        </form>

        <br><a href="/ExibirHospedagem/{{ $hospedagem->id }}">Voltar</a><br>
    </body>
</html>

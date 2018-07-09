<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
      <h1>Editar Servico</h1>

      <form action="/SalvarServico" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $servico->id}}" />
          Nome do serviço: <input type="text" name = "nomeServiço" value="{{$servico->nomeServiço}}"/> <br/>
          Preço: <input type="text" name = "preço" value="{{$servico->preço}}"/> <br/>

          Descrição: <input type="text" name = "descriçao" value="{{$anuncio->descriçao}}"/> <br/>
          Anunciante: <input type="text" name = "anunciante_id" value="{{$anuncio->anunciante_id}}"/> <br/>

          <input  type="submit" value="alterar" />
      </form>

    </body>
</html>
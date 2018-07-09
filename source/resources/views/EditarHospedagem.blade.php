<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
      <h1>Editar Hospedagem</h1>

      <form action="/SalvarHospedagem" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $hospedagem->id}}" />
          Nome da propriedade: <input type="text" name="nomePropriedade" value="{{$hospedagem->nomePropriedade}}"><br/>
          Preço diaria: <input type="text" name="precoDiaria" value="{{$hospedagem->precoDiaria}}"><br/>
          Anuncio ID: <input type="text" name="anuncio_id" value="{{$hospedagem->anuncio_id}}"><br/>

          Descricao: <input type="text" name="descricao" value="{{$anuncio->descricao}}"><br/>
          Anunciante id: <input type="text" name="anunciante_id" value="{{$anuncio->anunciante_id}}"><br/>

          <input  type="submit" value="alterar" />
      </form>

    </body>
</html>

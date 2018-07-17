<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <title>Contratar anuncio</title>
  </head>
  <body>

    <h1>Contratar anuncio</h1>
    <form action = "contratarAnuncio" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      id anuncio: <input type = "text" name = "anuncio_id" value={{ old('anuncio_id')}}> {{ $errors->first('anuncio_id')}} <br/>
      id cliente: <input type = "text" name = "cliente_id" value={{ old('cliente_id')}}> {{ $errors->first('cliente_id')}} <br/>
      data entrada: <input type = "date" name = "dataEntrada" value={{ old('dataEntrada')}}> {{ $errors->first('dataEntrada')}} <br/>
      data saída: <input type = "date" name = "dataSaida" value={{ old('dataSaida')}}> {{ $errors->first('dataSaida')}} <br/>
      quantidade de pessoas: <input type = "text" name = "quantPessoas" value={{ old('quantPessoas')}}> {{ $errors->first('quantPessoas')}}<br/>
      <input type="submit" value="contratarAnuncio" />
    </form>

  </body>
</html>

<!doctype html>
<html lang = "{{ app ()-> getLocale()}}">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Alysson Manso" >
    <link rel="icon" href="../../../../favicon.ico">

    <title>Agrotur</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

      <p> nome da propriedade: {{ $servicos->nomeServiço }} <br></p>
      <p> preco diaria: {{ $servicos->preço }} <br></p>
      <p> anuncio id: {{ $servicos->anuncio_id }} <br></p>
      <p> descrição: {{ $anuncio->descriçao }} <br></p>
      <p> anunciante id: {{ $anuncio->anunciante_id }} <br></p>
      
      @foreach ($imagens as $i)
        <img src="{{ asset($i->imagem) }}"/><br>
      @endforeach

      <a href="/EditarServico/{{$servicos->id}}">Editar Serviço</a><br>
      <a href="/EditarImagensServico/{{$servicos->id}}">Alterar Imagens</a><br>
      <a href="/RemoverServico/{{$servicos->id}}">Remover Serviço</a><br>
  </body>
</html>
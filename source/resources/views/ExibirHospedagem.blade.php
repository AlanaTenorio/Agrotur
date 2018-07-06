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

      <p> nome da propriedade: {{ $hospedagem->nomePropriedade }} <br></p>
      <p> preco diaria: {{ $hospedagem->preçoDiaria }} <br></p>
      <p> anuncio id: {{ $hospedagem->anuncio_id }} <br></p>
      <p> descrição: {{ $anuncio->descriçao }} <br></p>
      <p> anunciante id: {{ $anuncio->anunciante_id }} <br></p>
      
      <p> serviços oferecidos: </p>
      @foreach ($servicos as $s)
        <p> {{ $s->serviço }} </p>
      @endforeach

      @foreach ($imagens as $i)
        <img src="{{ asset($i->imagem) }}"/><br>
      @endforeach

      <a href="/EditarHospedagem/{{$hospedagem->id}}">Editar Hospedagem</a><br>
      <a href="/EditarImagensHospedagem/{{$hospedagem->id}}">Alterar Imagens</a><br>
      <a href="/EditarServicosHospedagem/{{$hospedagem->id}}">Alterar Serviços</a><br>
      <a href="/RemoverHospedagem/{{$hospedagem->id}}">Remover Hospedagem</a><br>
  </body>
</html>
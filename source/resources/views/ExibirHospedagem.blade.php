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
      <p> nome da propriedade: <?php echo $hospedagem->nomePropriedade ?> <br></p>
      <p> preco diaria: <?php echo $hospedagem->preçoDiaria ?> <br></p>
      <p> anuncio id: <?php echo $hospedagem->anuncio_id ?> <br></p>
      <?php $anuncio = \App\Anuncio::find($hospedagem->anuncio_id) ?>
      <p> descrição: <?php echo $anuncio->descriçao ?> <br></p>
      <p> anunciante id: <?php echo $anuncio->anunciante_id ?> <br></p>
      
      <?php 
        $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
        foreach ($imagens as $i) { 
          $path = (stream_get_contents($i->imagem)); ?>
          <img src="<?php echo $path ?>" /><br>
      <?php } ?>

      <a href="/EditarHospedagem/{{$hospedagem->id}}">Editar Hospedagem</a><br>
      <a href="/EditarImagens/{{$hospedagem->id}}">Alterar/Adicionar Imagens</a><br>
      <a href="/RemoverHospedagem/{{$hospedagem->id}}">Remover Hospedagem</a><br>
  </body>
</html>
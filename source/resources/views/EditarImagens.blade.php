<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>
    </head>
    <body>
    	<h1>Editar imagens</h1>

    	  <?php 
          $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
          foreach ($imagens as $i) {
            $path = (stream_get_contents($i->imagem)); ?>
            <img src="<?php echo $path ?>" />
            <a href="/RemoverImagem/{{$i->id}}">Remover</a><br>
        <?php } ?>

        <br>

        <form action="/SalvarImagem" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="hospedagem_id" value="{{ $hospedagem->id}}" />
          <input type="file" id="primaryImage" name="primaryImage" accept="image/*" />
          <input type="submit" name="enviar" value="ENVIAR"/>
        </form>

        <br><a href="/ExibirHospedagem/{{ $hospedagem->id}}">Voltar</a><br>
    </body>
</html>

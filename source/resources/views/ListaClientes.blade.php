<!doctype html>
<html lang = "{{ app ()-> getLocale()}}">
  <head>
    <title>Clientes cadastrados</title>
  </head>
  <body>
    <ul>
      <?php foreach ($clientes as $cliente){ ?>
        <li><?php echo $cliente->nome ?></li>
        <a href="/EditarCliente/{{$cliente->id}}">Editar</a>
        <a href="/RemoverCliente/{{$cliente->id}}">Remover</a>
      <?php } ?>
    </ul>
  </body>
</html>

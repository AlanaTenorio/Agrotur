<!doctype html>
<html lang = "{{ app ()-> getLocale()}}">
  <head>
    <title>Clientes cadastrados</title>
  </head>
  <body>
    <ul>
      <?php foreach ($clientes as $cliente){ ?>
        <li><?php echo $cliente->nome ?></li>
      <?php } ?>
    </ul>
  </body>
</html>

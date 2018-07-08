<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <title>Cadastrar Anuncio</title>
  </head>
  <body>
    <h1>Cadastrar Anuncio</h1>
    <form action = "cadastroServico" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      Nome do serviço: <input type="text" name = "nomeServico"/> <br/>
      Descrição: <input type="text" name = "descricao"/> <br/>
      Preço: <input type="text" name = "preco"/> <br/>
      Anunciante: <input type="text" name = "anunciante_id"/> <br/>
      <input type="submit" value="proximo" />
    </form>
  </body>
</html>

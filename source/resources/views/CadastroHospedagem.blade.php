<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <title>Cadastrar Anuncio</title>
  </head>
  <body>
    <h1>Cadastrar Anuncio</h1>
    <form action = "cadastroHospedagem" method = "post">
      <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
      Nome da propriedade: <input type="text" name = "nomePropriedade"/> <br/>
      Descrição: <input type="text" name = "descricao"/> <br/>
      Preço da diária: <input type="text" name = "precoDiaria"/> <br/>
      Anunciante: <input type="text" name = "anunciante_id"/> <br/>
      <input type="submit" value="proximo" />
    </form>
  </body>
</html>

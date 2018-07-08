<!doctype html>
<html lang ="{{ app()->getLocale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Eberson Manso" >
    <link rel="icon" href="../../../../favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body>
  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Agrotur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="view">Home <span class="sr-only">(current)</span></a>
            <li class="dropdown">
        			<a class="nav-link" data-toggle="dropdown" href="#">Opções Cliente
        			<span class="caret"></span></a>
        			<ul class="dropdown-menu">
          			<li><a href="EditarCliente">Editar Cliente</a></li>
          			<li><a href="ListaClientes">Listar Clientes</a></li>
        			</ul>
      		</li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>





   <p>&nbsp;&nbsp</p>

   <!-- Exibição do form de edicao -->

    <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Editar Senha</h4>
			<form action = "/SalvarSenhaCliente" method = "post">
          <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
          <input type="hidden" name="id" value="{{$cliente->id}}" />
          <form class="needs-validation" novalidate>
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="senha">Senha atual</label>
                <input type="password" name = "senha" class="form-control" id="senha" placeholder="" required> {{ $errors->first('senha')}} <br/>
                <div class="invalid-feedback">
                  É necessário uma senha válida.
                </div>

                <label for="senha">Nova Senha</label>
                <input type="password" name = "novaSenha" class="form-control" id="novaSenha" placeholder="" required> {{ $errors->first('novaSenha')}} <br/>
                <div class="invalid-feedback">
                  É necessário uma senha válida.
                </div>

                <label for="senha">Confirme a Senha</label>
                <input type="password" name = "novaSenha_confirmation" class="form-control" id="novaSenha-confirmacao" placeholder="" required>

              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>


  </body>
  </html>
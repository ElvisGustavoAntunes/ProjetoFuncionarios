<?php
    include_once("conexao.php");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Pessoas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/cep.js"></script>

     <!--NAVBAR-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div id="menu" class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse h5 mb-0" id="navbar">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
              <a class="nav-link" href="Pessoa.php">
                <img src="icons/pessoa.png" class="d-inline-block align-top" >
                Funcionários
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <img src="icons/empresa.png" class="d-inline-block align-top">
                Empresas
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" id="navdrop">
                  <img src="icons/procurar.png" class="d-inline-block align-top">
                          Cadastros
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="pesquisar.php">Empresas Cadastradas</a>
                  <a class="dropdown-item" href="pesquisarpessoa.php">Pessoas Cadastradas</a>
              </div>
          </li>
          </ul>
          <!--Pesquisar navbar-->
           <!-- <form class="form-inline">
              <input class="form-control  ml-4 mr-sm-2" type="search" placeholder="Buscar" aria-label="Pesquisar">
              <button class="btn btn-dark" type="submit">Ok</button>
            </form>-->
        </div>
      </div>
    </nav>

     <!--Texto ao usuario-->
     <div class="container">
        <div class="py-5 text-center">
          <h2>Cadastro de Funcionário</h2>
          <p class="lead">Estamos quase lá, precisamos somente de algumas informações.</p>
        </div>
        
        <!--Formulario, Dados-->

        <div class="col-13 order-md-3"> 
          <h4 class="mb-3">Insira os Dados do Funcionário</h4>
          <form name="p" id="p" method="POST" action="lerf.php">
            <div class="row">
              <div class="col-md-5 mb-3">
                Nome
                  <input type="text" class="form-control" name="nome" placeholder="" onkeypress="return onlyletters();" required>
                <div class="invalid-feedback">
                  Insira o Nome da Pessoa.
                </div>
              </div>
              <div class="col-md-5 mb-3">
                Sobrenome
                  <input type="text" class="form-control" name="sobrenome" onkeypress="return onlyletters();" placeholder="" required>
                <div class="invalid-feedback">
                  Insira o Sobrenome.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                Cpf
                  <input type="text" class="form-control" name="cpf" id="cpf" maxlength="11" onkeypress="return onlynumber();" onblur="TestaCPF(this)" required>
                <div class="invalid-feedback">
                  Insira o Cpf do Funcionario.
                </div>
              </div>
                <div class="col-md-3 mb-3">
                    Data Nascimento
                    <input type="date" class="form-control" name="nascimento" onkeypress="return onlynumber();" max="2004-12-01" required >
                </div>
                <div class="col-md-3 mb-3">
                    Salario
                    <input type="text" class="form-control" name="salario" id="salario"  onkeypress="return onlynumber();" required>
                  </div>
            </div>
                <div class="row">
                    <div class="col-md-10 mb-3">
                        
                        <select class="form-control" name="empresa" id="empresa">
                            <option >Empresas Cadastradas</option>
                                <?php
                                    $result_empresas = "SELECT * FROM empresas";
                                    $resultado_empresas = mysqli_query($conexao,$result_empresas);

                                    while($row_empresas = mysqli_fetch_assoc($resultado_empresas)){ 
                                      echo '<option value="'.$row_empresas['razaosocial'].'">'.$row_empresas['razaosocial'].'</options>';
                                    }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
          </form>
        </div>
        <!--RODAPÉ-->
        <footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2020 TESTE </p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacidade</a></li>
            <li class="list-inline-item"><a href="#">Termos</a></li>
            <li class="list-inline-item"><a href="#">Suporte</a></li>
          </ul>
        </footer>
  </body>
</html>
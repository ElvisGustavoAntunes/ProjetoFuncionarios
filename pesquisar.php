<?php 
    include "conexao.php";

//    $combo = mysqli_query("SELECT id,razaosocial,cnpj from empresas");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Pesquisar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="py-5 text-center">
          <h2>Cadastros Efetuados</h2>
          <p class="lead">o que está buscando? Espero te ajudar. </p>
        </div>
    </div>

    <?php
        $result_usuario = "SELECT * FROM empresas ORDER BY id DESC";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);

       // if(($result_usuario) AND ($result_usuario->num_rows !=0)){

    ?>
        <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>CEP</th>
                <th>RUA</th>
                <th>BAIRRO</th>
                <th>ESTADO</th>
                <th>CIDADE</th>
            </tr>   
        </thead>
        <tbody>
            <?php
            while($row_empresa = mysqli_fetch_assoc($resultado_usuario)) {
                ?>
                <tr>
                    <th><?php echo $row_empresa['id']; ?></th>
                    <td><?php echo $row_empresa['razaosocial']; ?></td>
                    <td><?php echo $row_empresa['cnpj']; ?></td>
                    <td><?php echo $row_empresa['cep']; ?></td>
                    <td><?php echo $row_empresa['rua']; ?></td>
                    <td><?php echo $row_empresa['bairro']; ?></td>
                    <td><?php echo $row_empresa['estado']; ?></td>
                    <td><?php echo $row_empresa['cidade']; ?></td>
                    <td><?php echo "<a href='apagaempresa.php?id=".$row_empresa['id']."'>Excluir</a>"?> </td>
                </tr>
                <?php
            }?>  
        </tbody>
        </table>
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

<?php

include_once("conexao.php");

$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

$result_empresa = "DELETE from empresas WHERE id='$id'";
mysqli_query($conexao,$result_empresa);


if(mysqli_affected_rows($conexao)){
    $_SESSION['msg'] = "<p style='color:green';'>Usuário Apagado</p>";
    header("Location: pesquisar.php");
}


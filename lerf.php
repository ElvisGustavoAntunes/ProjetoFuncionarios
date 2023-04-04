<?php

    include_once("conexao.php");

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $empresa = $_POST['empresa'];
    $salario = $_POST['salario'];

    if($cpf==""){
        include_once "pessoa.php";
    }else{
        $sql2 = "insert into pessoas (nome,sobrenome,cpf,datanascimento,empresa,salario) values ('$nome','$sobrenome','$cpf','$nascimento','$empresa','$salario')";
        $salvar = mysqli_query($conexao,$sql2);
    }

    mysqli_close($conexao);

    header("Location: pessoa.php");
?>
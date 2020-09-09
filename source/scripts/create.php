<?php

require_once 'db_connection.php';

// Se existe a variável do botão dentro do método POST
if(isset($_POST['btn-cadastrar'])){
    $nome = mysqli_escape_string($connection, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
    $cpf = mysqli_escape_string($connection, $_POST['cpf']);
    $email = mysqli_escape_string($connection, $_POST['email']);

    $query = "INSERT INTO cliente(nome, sobrenome, cpf, email) VALUES('$nome', '$sobrenome', '$cpf', '$email')";
    $result = mysqli_query($connection, $query);

    if($result){
        header('Location: ../index.php?sucesso');
    } else {
        header('Location: ../index.php?error');
    }
}
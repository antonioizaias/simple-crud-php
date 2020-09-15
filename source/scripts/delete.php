<?php
require_once 'db_connection.php';

// Iniciando a sessão
session_start();

// Verificando se existe a variável do botão dentro do método POST
if (isset($_POST['btn-deletar'])) {

    $id = mysqli_escape_string($connection, $_POST['id']);

    // Excluindo no banco de dados
    $query = "DELETE FROM cliente WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    // Retornando a página inicial com uma resposta da requisição
    if ($result) {
        $_SESSION['status'] = "Exclusão feita com sucesso!";
        header('Location: ../index.php');
    } else {
        $_SESSION['status'] = "Houve um erro na sua solicitação de exclusão!";
        header('Location: ../index.php');
    }
}
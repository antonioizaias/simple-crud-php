<?php
// Iniciando a sessão
session_start();

require_once 'db_connection.php';

// Se existe a variável do botão dentro do método POST
if (isset($_POST['btn-deletar'])) {
    $id = mysqli_escape_string($connection, $_POST['id']);

    $query = "DELETE FROM cliente WHERE id = '$id'";
    // Executando
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
<?php
require_once 'db_connection.php';

// Iniciando a sessão
session_start();

// Verificando se existe a variável do botão dentro do método POST
if (isset($_POST['btn-editar'])) {

    $id = mysqli_escape_string($connection, $_POST['id']);
    $nome = mysqli_escape_string($connection, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
    $cpf = mysqli_escape_string($connection, $_POST['cpf']);
    $email = mysqli_escape_string($connection, $_POST['email']);

    if ((empty($id)) or (empty($nome)) or (empty($sobrenome)) or (empty($cpf)) or (empty($email))) {
        $_SESSION['status'] = "Erro desconhecido. Código: 01";
        header('Location: ../index.php');
    } else {
        if (is_numeric($cpf)) {

            // Atualizando no banco de dados
            $query = "UPDATE cliente SET nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf', email = '$email' WHERE id = '$id'";
            $result = mysqli_query($connection, $query);

            // Retornando a página inicial com uma resposta da requisição
            if ($result) {
                $_SESSION['status'] = "Atualização feita com sucesso!";
                header('Location: ../index.php');
            } else {
                $_SESSION['status'] = "Houve um erro na sua solicitação de atualização!";
                header('Location: ../index.php');
            }

        } else {
            $_SESSION['status'] = "CPF inválido.";
            header('Location: ../pages/editar.php?id=' . $id);
        }
    }
}
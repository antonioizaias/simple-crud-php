<?php
require_once 'db_connection.php';

// Se existe a variável do botão dentro do método POST
if(isset($_POST['btn-deletar'])){
    $id = mysqli_escape_string($connection, $_POST['id']);

    $query = "DELETE FROM cliente WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if($result){
        header('Location: ../index.php?status=sucess');
    } else {
        header('Location: ../index.php?status=error');
    }
}
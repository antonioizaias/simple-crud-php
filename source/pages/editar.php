<?php
// Conexão com o banco de dados para a listagem de todos os dados que serão editados
require_once '../scripts/db_connection.php';

// Header
require_once '../templates/header.php';

// Buscando o identificador único retornado da página de listagem na URL
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connection, $_GET['id']);
    $query = "SELECT * FROM cliente WHERE id = '$id'";
    // Executando
    $result = mysqli_query($connection, $query);
    $values = mysqli_fetch_array($result);
}
?>

<!-- Body -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar</h3>
        <form action="../scripts/update.php" method="POST">
        <input type="hidden" value="<?php echo $values['id'];?>" name="id">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $values['nome'];?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $values['sobrenome'];?>">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cpf" id="cpf" maxlength="11" value="<?php echo $values['cpf'];?>">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?php echo $values['email'];?>">
                <label for="email">E-mail</label>
            </div>
            <br>
            <button type="submit" name="btn-editar" class="btn">Enviar</button>
            <a href="../index.php" class="btn">Voltar</a>
        </form>
    </div>
</div>

<?php
// Footer
require_once '../templates/footer.php';
?>
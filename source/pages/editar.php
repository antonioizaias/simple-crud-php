<?php
// Header
require_once '../templates/header.php';

// Conexão com o banco de dados
require_once '../scripts/db_connection.php';

// Respostas
require_once '../templates/response.php';
?>

<?php
if (isset($_GET['id'])) {
    
    // Identificador único retornado da página de listagem
    $id = mysqli_escape_string($connection, $_GET['id']);
    $query = "SELECT * FROM cliente WHERE id = '$id'";

    // Buscando todos os dados a partir do identificador único
    $result = mysqli_query($connection, $query);
    $values = mysqli_fetch_array($result);
}
?>

<!-- Body -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar</h3>
        <form action="../scripts/update.php" method="POST">
        <input type="hidden" value="<?= $values['id'] ?>" name="id">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?= $values['nome'] ?>" required="true">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?= $values['sobrenome'] ?>" required="true">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cpf" id="cpf" maxlength="11" value="<?= $values['cpf'] ?>" maxlength="11" required="true">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?= $values['email'] ?>" required="true">
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
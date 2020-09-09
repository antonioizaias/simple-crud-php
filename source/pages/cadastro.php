<?php
// Header
require_once '../templates/header.php';
?>

<!-- Body -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Cadastro</h3>
        <form action="../scripts/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cpf" id="cpf" maxlength="11">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email">
                <label for="email">E-mail</label>
            </div>
            <br>
            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="../index.php" class="btn">Voltar</a>
        </form>
        
    </div>
</div>

<?php
// Footer
require_once '../templates/footer.php';
?>
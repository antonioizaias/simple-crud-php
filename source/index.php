<?php
// Conexão com o banco de dados para a listagem de todos os dados
require_once 'scripts/db_connection.php';

// Header
require_once 'templates/header.php';

// Respostas
require_once 'templates/response.php';
?>

<!-- Body -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes</h3>
        <table class="striped center">
            <thead>
                <tr>
                    <th class="center">Nome</th>
                    <th class="center">Sobrenome</th>
                    <th class="center">CPF</th>
                    <th class="center">E-mail</th>
                    <th class="center"></th>
                </tr>
            </thead>
            <tbody>
                <!-- Buscando todos os dados -->
                <?php
                $query = "SELECT * FROM cliente";
                $result = mysqli_query($connection, $query);
                ?>
                
                <!-- Listando -->
                <?php while($values = mysqli_fetch_array($result)): ?>
                <tr>
                    <td class="center"> <?= $values['nome'] ?> </td>
                    <td class="center"> <?= $values['sobrenome'] ?> </td>
                    <td class="center"> <?= $values['cpf'] ?> </td>
                    <td class="center"> <?= $values['email'] ?> </td>
                    <td>
                        <div class="center">
                            <a href="pages/editar.php?id=<?= $values['id'] ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>
                            <a href="#modal<?= $values['id'] ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>
                        </div>
                    </td>
                    <!-- Modal Structure -->
                    <div id="modal<?= $values['id'] ?>" class="modal">
                        <div class="modal-content">
                        <h4>Excluir</h4>
                        <p>Você tem certeza?</p>
                        </div>
                        <div class="modal-footer">
                        <form action="scripts/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $values['id'] ?>">
                            <button type="submit" name="btn-deletar" class="btn red">Continuar</button>
                            <a href="#" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                        </div>
                    </div>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <br>
        <a href="pages/cadastrar.php" class="btn">Adicionar</a>
    </div>
</div>

<?php
// Footer
require_once 'templates/footer.php';
?>
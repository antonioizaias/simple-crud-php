<?php
// Conexão com o banco de dados para listar todos os dados
require_once ('scripts/db_connection.php');

// Header
require_once ('templates/header.php');
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
                <?php
                    $query = "SELECT * FROM cliente";
                    $result = mysqli_query($connection, $query);
                    while($values = mysqli_fetch_array($result)):
                ?>
                <tr>
                    <td class="center"> <?php echo $values['nome'] ?> </td>
                    <td class="center"> <?php echo $values['sobrenome'] ?> </td>
                    <td class="center"> <?php echo $values['cpf'] ?> </td>
                    <td class="center"> <?php echo $values['email'] ?> </td>
                    <td>
                        <div class="center">
                            <a href="" class="btn-floating orange"><i class="material-icons">edit</i></a>
                            <a href="" class="btn-floating red"><i class="material-icons">delete</i></a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="pages/cadastro.php" class="btn">Adicionar</a>
    </div>
</div>

<?php
// Footer
require_once 'templates/footer.php';
?>
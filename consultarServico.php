<?php
session_start();
include_once './config/config.php';
include_once './classes/Veiculo.php';
include_once './classes/Funcionario.php';
include_once './classes/Servico.php';

$funcionarios = new Funcionario($db);
if (!isset($_SESSION['funcionario_id'])) {
    header('Location: index.php');
    exit();
}

$servico = new Servicos($db);
$dados = $servico->ler();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/consServico.css">

    <title>Portal</title>
</head>

<body>
    <header>
        <div class="cabecalho">

        <img src="./img/Logo Auto Peças (1).png" alt="Logo" class="logo">
            <h1 id="h1_cabecalho">XIRUZÃO AUTO PEÇAS</h1>
            <h3>Faça login para acessar o sistema e
                ajudar a manter nosso estoque sempre em movimento.</h3>
        </div>
    </header>

    <div class="buttons">
        <a href="cadastrarServico.php">Cadastrar serviço</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-container">
        <table class="user-table">
            <tr>
                <th>ID</th>
                <th>Tipo de serviço:</th>
                <th>Data:</th>
                <th>Valor:</th>
                <th>Cliente:</th>
                <th>Veiculo:</th>
            </tr>
            <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['tipo_servico']; ?></td>
                    <td><?php echo $row['data_servico']; ?></td>
                    <td><?php echo $row['valor']; ?></td>
                    <td><?php echo $row['cliente_id']; ?></td>
                    <td><?php echo $row['veiculo_id']; ?></td>
                    <td>
                        <a href="editarCliente.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="portal.php?deletar=<?php echo $row['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>
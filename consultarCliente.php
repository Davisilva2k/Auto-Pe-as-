<?php
include_once './config/config.php';
include_once './classes/Cliente.php';
include_once './classes/Veiculo.php';

date_default_timezone_Set('America/Sao_Paulo');
if (isset($_SESSION['cliente_id'])) {
    header('location: telaLogin.php');
    exit();
}
$clientes = new Cliente($db);

if (isset($_POST['deletarCliente'])) {
    try {
        $id = $_GET['deletarCliente'];
        $clientes->deletarCliente($id);
        header('location:index.php');
        exit();
    } catch (Exception $e) {
        echo '<p style="color: red;">Erro ao excluir cliente: ' . $e->getMessage() . '</p>';
    }
}
if (isset($_GET['editarCliente'])) {  // Mudamos de "deletar" para "editar"
    try {
        $id = $_GET['editarCliente'];
        $clientes->atualizarCliente($id, $cpf, $nome, $cep,$veiculo_id);
        header("Location: editarCliente.php"); // Redireciona para a página de edição
        exit();
    } catch (Exception $e) {
        echo '<p style="color: red;">Erro ao editar cliente: ' . $e->getMessage() . '</p>';
    }
}

$dados = $clientes->ler();

function saudacao()
{
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } else if ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Portal</title>
</head>

<body>
<header>
        <div class="cabecalho">

        <img src="./img/logo-tipo-semfundo.png" alt="Logo" class="logo">
            <h1 id="h1_cabecalho">XIRUZÃO AUTO PEÇAS</h1>
        
        </div>
    </header>

    <div class="container">
        <div class="box">

        <div class="buttons">
    <a href="cadastrarCliente.php">Adicionar Cliente</a> <br>
    <a href="principal.php">HOME</a>
    </div>

    <div class="main-container">
    <table class="user-table">
        <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>NOME</th>
            <th>CEP</th>
            <th>VEICULO_ID</th>
            <th>AÇÃO</th>
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['cpf']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cep']; ?></td>
                <td><?php echo $row['veiculo_id']; ?></td>
                <td>
                    <a href="editarCliente.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="consultarCliente.php?deletar=<?php echo $row['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <button class="button print-button" onclick="window.print()">Imprimir Tabela</button>

</body>

</html>
<?php
include_once './config/config.php';
include_once './classes/Funcionario.php';
session_start();
$funcionarios = new Funcionario($db);
if (!isset($_SESSION['funcionario_id'])) {
    header('Location: principal.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/principal.css">
    <title>TELA PRINCIPAL</title>
    <link rel="shortcut icon" href="./img/construction.png" type="image/png">
</head>

<body>
    <header>
        <div class="cabecalho">
        <img src="./img/Logo Auto Peças (1).png" alt="Logo" class="logo">

            <h1 id="h1_cabecalho">XIRUZÃO AUTO PEÇAS</h1>
            <h3>Faça login para acessar o sistema e ajudar a manter nosso estoque sempre em movimento.</h3>
        </div>
    </header>

    <div class="message">
        <H1>Olá <?php echo $_SESSION['funcionario_nome'] ?></H1>
    </div>

    <div class="button-container">
        <h3>CONSULTAR</h3>
        <a href="./consultarCliente.php">consultarCliente</a><br>
        <a href="./consultarVeiculo.php">Consultar veiculo</a><br>
        <a href="./consultarFuncionario.php">Consultar funcionario</a><br>
        <a href="./consultarEstoqueAcessorio.php">Consultar Acessórios</a><br>
        <a href="./consultarPromocao.php">Consultar Promocao</a><br>
        <a href="./consultarEstoquePecas.php">Consultar Peças</a><br>
        <a href="./consultarServico.php">Consultar Serviços</a>
<br><br>
        <h3>CADASTRAR</h3>
        <a href="./cadastrarCliente.php">Cadastrar Cliente </a><br>
        <a href="./cadastrarEstoqueAcessorio.php">Cadastrar Acessorios</a><br>
        <a href="./cadastrarEstoquePecas.php">Cadastrar Peças</a><br>
        <a href="./cadastrarServico.php">Cadastrar Servicos</a><br>
        <a href="./cadastrarVeiculo.php">Cadastrar Veiculos</a><br>
        <a href="./cadastrarFuncionario.php">Cadastrar funcionario</a><br>
        <a href="./cadastrarPromocao.php">Cadastrar Promocao</a><br>
        <h3>DESLOGAR</h3>
        <a href="./logout.php">Logout</a>
    </div>
</body>

</html>
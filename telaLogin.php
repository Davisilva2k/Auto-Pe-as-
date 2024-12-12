<?php
include_once './config/config.php';
include_once './classes/Funcionario.php';
session_start();
$funcionarios = new Funcionario($db);
if (!isset($_SESSION['funcionario_id'])) {
    header('Location: index.php');
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
    <title>Document</title>
</head>
<body>

    <header>
        <h1>Xiruzão Auto Peças</h1>
        <h3></h3>
    </header>ade
    <H1>Olá <?php echo $_SESSION['funcionario_nome']?></H1>
    <a href="./telaLogin.php">Tela login</a><br>
    <a href="./cadastrarCliente.php">Cadastrar Cliente </a><br>
    <a href="./cadastrarEstoqueAcessorio.php">Cadastrar Acessorios</a><br>
    <a href="./cadastrarEstoquePecas.php">Cadastrar Peças</a><br>
    <a href="./cadastrarServico.php">Cadastrar Servicos</a><br>
    <a href="./cadastrarVeiculo.php">Cadastrar Veiculos</a><br>
    <a href="./consultarCliente.php">consultarCliente</a><br>
    <a href="./consultarVeiculo.php">Consultar veiculo</a><br>
    <a href="./registrarFuncionario.php">Cadastrar funcionario</a><br>
    <a href="./consultarFuncionario.php">Consultar funcionario</a><br>
    <a href="./cadastrarPromocao.php">Cadastrar Promocao</a><br>
    <a href="./consultarEstoqueAcessorio.php">Consultar Acessórios</a><br>
    <a href="./consultarPromocao.php">Consultar Promocao</a><br>
    <a href="./consultarEstoquePecas.php">Consultar Peças</a><br>

    <a href="./logout.php">Logout</a>
</body>     /
'*

</html>
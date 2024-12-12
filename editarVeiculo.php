<?php
include_once("./classes/Veiculo.php");
include_once("./config/config.php");
include_once("./classes/Cliente.php");

$vei = new Veiculo($db);
$cli = new Cliente($db);

// Processa o formulário de atualização
if (isset($_POST['atualizarVeiculo'])) {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];

    try {
        // Atualiza os dados do cliente no banco de dados
        $vei->atualizarVeiculo($id, $cpf, $nome, $cep, $veiculo_id);
        header("Location: consultarCliente.php"); // Redireciona para a página de gerenciamento
        exit();
    } catch (Exception $e) {
        echo '<p style="color: red;">Erro ao atualizar cliente: ' . $e->getMessage() . '</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Veiculo</title>
    <link rel="shortcut icon" href="./img/img_pessoa.png" type="image/png">
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

            <form method="post" action="editarVeiculo.php">
                <label for="placa ">PLACA</label>
                <input type="text" name="placa" id="placa" value="<?php echo $vei['placa']; ?>" required><br><br>

                <label for="modelo">MODELO:</label>
                <input type="text" name="modelo" id="modelo" value="<?php echo $vei['modelo']; ?>" required><br><br>

                <label for="marca">MARCA:</label>
                <input type="text" name="marca" id="marca" value="<?php echo $vei['marca']; ?>" required><br><br>

                <label for="ano">ANO:</label>
                <input type="text" name="ano" id="ano" value="<?php echo $vei['ano']; ?>" required><br><br>

                <a href="portal.php">Voltar</a> <br><br>
                <button type="submit" name="atualizarCliente">Atualizar</button>
            </form>
        </div>
    </div>
</body>

</html>
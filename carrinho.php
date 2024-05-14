<?php
session_start();
include 'auth_check.php'; // Inclui o script de checagem de autenticação
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_GET['update']) && isset($_GET['quantity']) && is_numeric($_GET['quantity'])) {
    $id = intval($_GET['update']);
    $quantity = intval($_GET['quantity']);
    $_SESSION['carrinho'][$id] = $quantity;
    header("Location: carrinho.php");
    exit;
}

$totalGeral = 0;
$items = [];
if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $stmt = $conn->prepare("SELECT nome, preco, imagem FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($produto = $resultado->fetch_assoc()) {
            $subtotal = $produto['preco'] * $quantidade;
            $totalGeral += $subtotal;
            $items[] = ['produto' => $produto, 'quantidade' => $quantidade, 'subtotal' => $subtotal];
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body style="background-color: #f0f0f0; color: #333; font-family: 'Roboto'; margin: 0; padding: 0;">
    <div class="container" style="max-width: 90%; margin: 30px auto;">
        <div class="card border-info" style="border:none">
            <div class="card-header bg-info text-white" style="background-color: #224840 !important;">
            <span style="font-size: 1.35em;">Seu carrinho</span>
            <?php if (isset($_SESSION['username'])): ?>
            <div style="font-size: 0.85em;">Olá, <?php echo $_SESSION['username']; ?>! Bem vindo.</div><?php endif; ?>
                <a href="index.php" class="float-right" style="text-decoration: none; color: black; background-color: #bce69e; padding: 10px 20px; border-radius: 5px; border: 2px solid #224840; transition: background-color 0.3s, color 0.3s;" onmouseover="this.style.backgroundColor='#224840'; this.style.color='white';" onmouseout="this.style.backgroundColor='#bce69e'; this.style.color='black';">Inicio</a>
            </div>
            <div class="card-body">
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <div class="row mb-3">
                            <div class="col-md-3 col-12">
                                <img class="img-fluid" src="<?= $item['produto']['imagem']; ?>" alt="<?= $item['produto']['nome']; ?>" style="width: 100%; height: auto; max-width: 150px; border-radius: 5px;">
                            </div>
                            <div class="col-md-3 col-6">
                                <label>Valor Unitário:</label>
                                <input type="text" class="form-control" value="<?= number_format($item['produto']['preco'], 2, ',', '.'); ?>" readonly>
                            </div>
                            <div class="col-md-2 col-6">
                                <label>Quantidade:</label>
                                <input type="number" class="form-control" value="<?= $item['quantidade']; ?>" onchange="updateQuantity(<?= $id; ?>, this.value)">
                            </div>
                            <div class="col-md-3 col-12">
                                <label>Valor Final:</label>
                                <input type="text" class="form-control" value="<?= number_format($item['subtotal'], 2, ',', '.'); ?>" readonly>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                    <strong style="display: block; text-align: center;">Total Geral: R$ <?= number_format($totalGeral, 2, ',', '.'); ?></strong>
                <?php else: ?>
                    <p>Seu carrinho está vazio.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer text-center">
            <div class="d-flex flex-column flex-md-row justify-content-center">
                <a href="produtos.php" class="btn btn-primary my-1 mx-md-1 flex-fill" style="background-color: #224840; color: #f0f0f0; padding: 10px 20px; border-radius: 4px; border:none" onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#f0f0f0';">Continuar Comprando</a>
                <a href="endereco.php" class="btn btn-success my-1 mx-md-1 flex-fill" style="background-color: #224840; color: #f0f0f0; padding: 10px 20px; border-radius: 4px; border:none" onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#f0f0f0';">Fazer Pagamento</a>
                <a href="limpar_carrinho.php" class="btn btn-danger my-1 mx-md-1 flex-fill" style="background-color: #dc3545; color: #fff; padding: 10px 20px; border-radius: 4px; border:none" onclick="return confirm('Tem certeza que deseja limpar o carrinho?')" onmouseover="this.style.backgroundColor='red'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#dc3545'; this.style.color='#fff';">Limpar Carrinho</a>
            </div>
        </div>

        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function updateQuantity(productId, newQuantity) {
        window.location.href = `carrinho.php?update=${productId}&quantity=${newQuantity}`;
    }
    </script>
</body>
</html>

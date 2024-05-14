<?php
session_start();
include 'auth_check.php'; // Inclui o script de checagem de autenticação
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o ID do produto foi passado e é válido
if (isset($_GET['add']) && is_numeric($_GET['add'])) {
    $productId = (int) $_GET['add'];

    // Inicializa o carrinho se ainda não foi inicializado
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Adicionar o produto ao carrinho ou aumentar a quantidade se já estiver no carrinho
    if (isset($_SESSION['carrinho'][$productId])) {
        $_SESSION['carrinho'][$productId]++;
    } else {
        $_SESSION['carrinho'][$productId] = 1;
    }

    // Mensagem de confirmação (opcional)
    echo "<p>Produto adicionado ao carrinho! Quantidade no carrinho para produto ID $productId: " . $_SESSION['carrinho'][$productId] . "</p>";

    // Debug: Exibir a sessão para verificar se o carrinho foi atualizado corretamente
    echo '<pre>Debug de Sessão: ';
    var_dump($_SESSION['carrinho']);
    echo '</pre>';

    // Redirecionar para a página do carrinho
    header("Location: carrinho.php");
    exit;
}

// Obter o termo de busca da URL
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

// Consulta SQL modificada para incluir a busca
$sql = $busca ? "SELECT * FROM produtos WHERE nome LIKE '%$busca%'" : "SELECT * FROM produtos";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f0f0f0; font-family: 'Roboto'; padding-bottom:70px">
    <header style="background-color: #224840; margin: 0; padding: 10px; text-align: center;">
        <div class="container col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="index.php">
                <img class="logo_sem_fundo" src="./img/logo.png" alt="logo" style="max-width: 100px; margin: 0; padding: 0;"/>
            </a>
        </div>
        <div style="flex-basis: 50%; text-align: right; color: white;">
        <?php
        if (isset($_SESSION['username'])) {
            echo "Olá, " . $_SESSION['username'] . "! Bem vindo.";}?>
        </div>
    </header>
    <div class="container">
        <h1 style="margin-bottom: 50px; margin-top: 30px; text-align: center; font-family: 'Roboto'">Nossos Produtos</h1>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="box" style="background-color: rgba(188, 230, 158, .17); border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 20px;">
                        <div class="img-box">
                            <img src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>" style="width: 100%; height: auto; border-radius: 10px;">
                        </div>
                        <div class="detail-box" style="padding: 20px;">
                            <ul style="list-style-type: none; padding: 0;">
                                <li style="margin-bottom: 10px;"><strong style="color: #224840;"><?php echo $row['nome']; ?>:</strong> <?php echo $row['descricao']; ?></li>
                                <li style="margin-bottom: 10px;"><strong>Preço:</strong> <span style="color: #333; font-weight: bold;">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></span></li>
                                <a href="produtos.php?add=<?php echo $row['id']; ?>" style="text-decoration: none; background-color: #224840; color: #fff; padding: 10px 20px; border-radius: 5px; display: inline-block; margin-top: 10px;">Adicionar ao carrinho</a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
        <footer style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #224840; color: #fff; padding: 20px; text-align: center; font-family: 'Roboto', sans-serif;">
            &copy; 2024 DAISY-GARDEN. Todos os direitos reservados.
        </footer>
</body>
</html>
<?php $conn->close(); ?>

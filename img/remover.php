<?php
session_start();

// Checa se o ID do produto está presente na URL
if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    // Remove o produto do carrinho
    if (isset($_SESSION['carrinho'][$produto_id])) {
        unset($_SESSION['carrinho'][$produto_id]);
    }
}

// Redireciona de volta para a página do carrinho
header("Location: carrinho.php");
exit();

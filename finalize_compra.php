<?php
session_start();
include 'auth_check.php'; // Checa autenticação

if (isset($_SESSION['carrinho'])) {
    // Aqui você pode adicionar lógica adicional se necessário para processar o pedido

    unset($_SESSION['carrinho']); // Esvazia o carrinho
    header("Location: index.php"); // Redireciona para a página inicial
    exit;
}


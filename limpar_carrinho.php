<?php
session_start();

// Esvaziar o carrinho
$_SESSION['carrinho'] = array();

// Redirecionar de volta para a página do carrinho ou para onde desejar
header("Location: carrinho.php");
exit;


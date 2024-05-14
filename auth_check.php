<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Informar o usuário e/ou fornecer um link para login
    $login_message = "Você não está logado. <a href='login-cadastro.php'>Clique aqui para entrar</a>";
}

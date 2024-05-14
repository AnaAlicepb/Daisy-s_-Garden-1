<?php
session_start();  // Iniciar sessão para poder acessar e destruir a sessão
session_destroy();  // Destruir todas as variáveis de sessão

// Redirecionar para a página inicial ou de login
header('Location: index.php');  // Substitua 'index.php' pelo arquivo que você preferir
exit;


<?php
session_start(); // Sempre comece com session_start() antes de usar $_SESSION
include 'auth_check.php'; // Inclui o script de checagem de autenticação

$totalItens = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $totalItens += $quantidade; // Soma a quantidade de cada item
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS do Bootstrap v5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="index.css">

  <title>Inicio</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #224840;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./img/logo.png" alt="logo" width="100" height="auto">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #bce69e; border: none; box-shadow: none;" onmouseover="this.style.backgroundColor='#f0f0f0';" onmouseout="this.style.backgroundColor='#bce69e'; this.style.color='#2d3436';" onfocus="this.style.outline='none';" onmousedown="this.style.outline='none';">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color: #f0f0f0;">Inicio</a>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['username'])): ?>
              <a class="nav-link" href="logout.php" target="_blank" style="color: #f0f0f0;">Sair</a>
            <?php else: ?>
              <a class="nav-link" href="login-cadastro.php" target="_blank" style="color: #f0f0f0;">Entrar</a>
            <?php endif; ?>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="produtos.php" target="_blank" style="color: #f0f0f0;">Produto</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #f0f0f0;">Equipe</a>
            <ul class="dropdown-menu"
              <li><a class="dropdown-item" href="https://www.linkedin.com/in/anaalice20/"target="_blank" style="color: #2d3436;">Ana Alice</a></li>
              <li><hr class="dropdown-divider" style="background-color: #bce69e;"></li>
              <li><a class="dropdown-item" href="#" style="color: #2d3436;">Luiza</a></li>
              <li><hr class="dropdown-divider" style="background-color: #bce69e;"></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex align-items-center" action="produtos.php" method="get" role="search">
            <!-- Grupo do input para controlar melhor o layout -->
            <div class="me-2 flex-grow-1">
                <input class="form-control" type="search" name="termo" placeholder="Buscar produto" aria-label="Search">
            </div>
                  <!-- Botão de busca -->
            <button class="btn btn-outline-success" type="submit" style="background-color: #bce69e; color: #2d3436; padding-left: 20px; padding-right: 20px;">
                Buscar
            </button>
                <!-- Contêiner para ícone do carrinho e saudação -->
            <div style="display: flex; align-items: center; position: relative; margin-left: 10px;">
            <a href="carrinho.php" style="position: relative; display: inline-block; text-decoration: none; color: inherit;">
                  <i class="fas fa-shopping-cart" style="font-size: 30px; color: #fff;"></i>
                  <!-- Notificação do carrinho -->
                  <span id="cart-notification" class="notification" style="position: absolute; top: -5px; right: -5px; background-color: red; color: white; border-radius: 50%; width: 20px; height: 20px; font-size: 12px; display: flex; justify-content: center; align-items: center; <?= $totalItens > 0 ? 'visibility: visible;' : 'visibility: hidden;' ?>">
                      <?= $totalItens ?>
                  </span>
            </a>



                <!-- Mensagem de saudação -->
                <?php if (isset($_SESSION['username'])): ?>
                <div style="font-size: 0.85em; color: white; margin-left: 10px;">
                    Olá, <?php echo htmlspecialchars($_SESSION['username']); ?>! Bem vindo.
                </div>
              <?php endif; ?>
            </div>
          </form>

      </div>
    </div>
  </nav>

        <!-- Carrossel Adicionado Aqui -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
      <img src="./img/assim.png" class="d-block w-100" alt="01" style="height: auto; object-fit: cover;">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
      <img src="./img/carosel02.jpg" class="d-block w-100" alt="02" style="height:auto; object-fit: cover;">
      </div>
      <div class="carousel-item">
      <img src="./img/Carosel03.png" class="d-block w-100" alt="03" style="height:90vh; object-fit: cover;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
      <footer style="position: relative; bottom: 0; width: 100%; background-color: #224840; color: #fff; padding: 20px; text-align: center; font-family: 'Roboto';">
          &copy; 2024 DAISY-GARDEN. Todos os direitos reservados.
      </footer>

  <!-- JavaScript do Bootstrap v5 (opcional, apenas se você estiver usando funcionalidades JavaScript do Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




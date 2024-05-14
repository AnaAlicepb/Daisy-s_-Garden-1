<?php
// Lógica PHP para processar o login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email']; // Recebe o email do formulário
    $senha = $_POST['senha']; // Recebe a senha do formulário
    // Aqui você adicionaria a lógica para verificar essas credenciais no banco de dados
}

// Lógica PHP para processar o cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Aqui a lógica para registrar o usuário no banco de dados
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login e Cadastro com Transição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="overflow-x: auto; background-color: #f0f0f0; font-family: 'Roboto'">
    <header style="background-color: #224840; margin: 0; padding: 10px; text-align: center;">
        <div class="container">
            <a href="index.php">
                <img class="logo_sem_fundo" src="./img/logo.png" alt="logo" style="max-width: 100px; margin: 0; padding: 0;"/>
            </a>
        </div>
    </header>
    <div class="container registro mx-auto mt-5" style="margin-top: 100px; margin-left: 20px; margin-right: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: rgba(188, 230, 158, .17); border-radius: 60px; padding: 20px;">
        <div class="row">
            <div class="col-md-8 registro-esquerdo">
                <h1>DAYSY'S GARDEN</h1>
                <h3>Bem-vindo</h3>
                <p>Você está a 30 segundos!</p>
            </div>
            <div class="col-md-9 registro-direito">
                <ul class="nav nav-tabs nav-justified" id="meuTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true" style="background-color: #224840; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color .3s ease; " onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#fff';">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="novousuario-tab" data-bs-toggle="tab" href="#novousuario" role="tab" aria-controls="novousuario" aria-selected="false" style="background-color: #224840; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color .3s ease;" onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#fff';">Novo Usuário</a>
                    </li>
                </ul>
                <div class="tab-content" id="meuTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <h3 class="registro-titulo">Entrar</h3>
                        <form class="formulario-inline" action="login.php" method="post">
                            <div class="row registro-formulario">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="E-mail" name="email" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Senha *" name="senha" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn-entrar" value="Entrar" style="background-color: #224840; color: #fff; margin-top:10px; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color .3s ease;" onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#fff';" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="novousuario" role="tabpanel" aria-labelledby="novousuario-tab">
                        <h3 class="registro-titulo">Novo Usuário</h3>
                        <form class="formulario-inline" action="registro.php" method="post">
                            <div class="row registro-formulario">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nome *" name="nome" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Sobrenome *" name="sobrenome" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-mail *" name="email" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Telefone *" name="telefone" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control date-input" placeholder="Data de Nascimento *" name="data_nascimento" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Senha *" name="senha" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirmar Senha *" name="confirmar_senha" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn-registrar" value="Registrar" style="background-color: #224840; color: #fff; margin-top:10px; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color .3s ease;" onmouseover="this.style.backgroundColor='#bce69e'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#224840'; this.style.color='#fff';" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

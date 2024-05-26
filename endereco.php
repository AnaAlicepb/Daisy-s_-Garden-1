<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Página de Pagamento</title>
</head>
<body style="background-color: #f0f0f0; font-family: 'Roboto'; padding-bottom: 70px;">
    <header style="background-color: #224840; margin: 0; padding: 10px; text-align: center;">
        <div class="container col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="index.php">
                <img class="logo_sem_fundo" src="./img/logo.png" alt="logo" style="max-width: 100px; margin: 0; padding: 0;"/>
            </a>
        </div>
        <div style="flex-basis: 50%; text-align: right; color: white;">
            <?php if (isset($_SESSION['username'])) {
                echo "Olá, " . $_SESSION['username'] . "! Bem vindo.";
            } ?>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card mb-3" style="background-color: rgba(188, 230, 158, .17); border-radius: 15px;">
                    <div class="card-header text-center" style="font-size: 24px; font-weight: bold; color: #333;">Cadastre o seu Endereço</div>
                    <div class="card-body">
                        <form action="processar_endereco.php" method="post">
                            <div class="mb-3">
                                <label for="endereco" class="form-label"><strong>Endereço de Envio:</strong></label>
                                <input type="text" id="endereco" class="form-control" name="endereco" required />
                            </div>
                            <div class="mb-3">
                                <label for="numero_casa" class="form-label"><strong>Número da Casa:</strong></label>
                                <input type="text" id="numero_casa" class="form-control" name="numero_casa" required />
                            </div>
                            <div class="mb-3">
                                <label for="complemento" class="form-label"><strong>Complemento:</strong></label>
                                <input type="text" id="complemento" class="form-control" name="complemento" />
                            </div>
                            <div class="mb-3">
                                <label for="pais" class="form-label"><strong>País:</strong></label>
                                <input type="text" id="pais" class="form-control" name="pais" required />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label"><strong>Nome:</strong></label>
                                    <input type="text" id="nome" class="form-control" name="nome" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="sobrenome" class="form-label"><strong>Sobrenome:</strong></label>
                                    <input type="text" id="sobrenome" class="form-control" name="sobrenome" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cidade" class="form-label"><strong>Cidade:</strong></label>
                                <input type="text" id="cidade" class="form-control" name="cidade" required />
                            </div>
                            <div class="mb-3">
                            <label for="estado" class="form-label"><strong>Estado:</strong></label>
                            <input type="text" id="estado" class="form-control" name="estado" required />
                            </div>
                            <div class="mb-3">
                                <label for="cep" class="form-label"><strong>CEP:</strong></label>
                                <input type="text" id="cep" class="form-control" name="cep" required title="Digite um CEP válido formato: 12345-678" />
                            </div>
                            <div class="mb-3">
                                <label for="numero_de_telefone" class="form-label"><strong>Número de Telefone:</strong></label>
                                <input type="text" id="numero_de_telefone" class="form-control" name="numero_de_telefone" required title="Digite um número de telefone válido formato: (12) 3456-7890" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                <input type="email" id="email" class="form-control" name="email" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aplicando máscaras
        document.addEventListener("DOMContentLoaded", function() {
        console.log(document.getElementById("cep")); // Deve mostrar o elemento no console
        console.log(document.getElementById("numero_de_telefone")); // Deve mostrar o elemento no console

        Inputmask("99999-999").mask(document.getElementById("cep"));
        Inputmask("(99) 9999-9999").mask(document.getElementById("numero_de_telefone"));
});

    </script>
</body>
</html>

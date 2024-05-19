<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Seguro</title>
    <!-- Bootstrap CSS v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .hand { cursor: pointer; }
        .card-icons li { display: inline; margin-right: 10px; font-size: 24px; }
    </style>
</head>
<body>
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
        <div class="card">
            <div class="card-header">
                <i class="fas fa-lock"></i> Pagamento Seguro
            </div>
            <div class="card-body">
                <form id="paymentForm">
                    <div class="mb-3 row">
                        <label class="col-md-12 col-form-label"><strong>Tipo de Cartão:</strong></label>
                        <div class="col-md-12">
                            <select id="CreditCardType" name="CreditCardType" class="form-select">
                                <option value="5">Visa</option>
                                <option value="6">MasterCard</option>
                                <option value="7">American Express</option>
                                <option value="8">Discover</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-12 col-form-label"><strong>Número do Cartão:</strong></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="car_number" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-12 col-form-label"><strong>CVV do Cartão:</strong></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="car_code" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-12 col-form-label"><strong>Data de Expiração:</strong></label>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option>Mês</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option>Ano</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <span>Pague de forma segura usando seu cartão de crédito.</span>
                        </div>
                        <div class="col-md-12">
                            <ul class="card-icons">
                                <li class="hand"><i class="fab fa-cc-visa"></i></li>
                                <li class="hand"><i class="fab fa-cc-mastercard"></i></li>
                                <li class="hand"><i class="fab fa-cc-amex"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3 row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary" id="finalizeOrder">Finalizar Pedido</button>
    </div>
</div>
</form>
</div>
</div>
</div>
<!-- Modal de Sucesso -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Pagamento Confirmado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                O seu pagamento foi realizado com sucesso! Obrigado por sua compra.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS v5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const form = document.getElementById('paymentForm');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();

    // Define um temporizador para redirecionar após 3 segundos
    setTimeout(function() {
        window.location.href = 'finalize_compra.php'; // Redireciona para o script de finalização da compra
    }, 3000); // 3000 milissegundos = 3 segundos
});
</script>


</body>
</html>

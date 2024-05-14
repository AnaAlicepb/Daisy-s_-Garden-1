<?php
session_start(); // Sempre comece com session_start() antes de usar $_SESSION

$servername = "localhost";
$username = "root"; // Seu nome de usuário do MySQL
$password = ""; // Sua senha do MySQL
$dbname = "usuarios"; // Nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare e vincule
    $stmt = $conn->prepare("SELECT id, senha, nome FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Definir parâmetros e executar
    $email = $_POST['email'];
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($_POST['senha'], $row['senha'])) {
            $_SESSION['user_id'] = $row['id'];

            // Extrair o primeiro nome do campo 'nome'
            $nomeCompleto = $row['nome'];
            $nomePartes = explode(' ', $nomeCompleto);
            $primeiroNome = $nomePartes[0];
            $_SESSION['username'] = $primeiroNome;

            // Redirecionar para a página inicial após o login
            header("Location: produtos.php");
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Nenhum usuário encontrado com esse e-mail.";
    }
    $stmt->close();
}
$conn->close();


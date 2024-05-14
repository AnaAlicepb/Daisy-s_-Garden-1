<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $sobrenome = $conn->real_escape_string($_POST['sobrenome']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $data_nascimento = $conn->real_escape_string($_POST['data_nascimento']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $confirmar_senha = $conn->real_escape_string($_POST['confirmar_senha']);

    if ($senha !== $confirmar_senha) {
        echo "As senhas não correspondem!";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone, data_nascimento, senha)
                VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$data_nascimento', '$senha_hash')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo usuário cadastrado com sucesso! Faça login.";
            header('Location: login-cadastro.php');
            exit; {
            }
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();


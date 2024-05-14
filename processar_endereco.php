<?php
session_start();
$host = "localhost"; // ou IP do servidor de banco de dados
$username = "root"; // seu usuário de banco de dados
$password = ""; // sua senha de banco de dados
$dbname = "cadastro_endereco"; // nome do banco de dados

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$endereco = $conn->real_escape_string($_POST['endereco']);
$numero_casa = $conn->real_escape_string($_POST['numero_casa']);
$complemento = $conn->real_escape_string($_POST['complemento']);
$pais = $conn->real_escape_string($_POST['pais']);
$nome = $conn->real_escape_string($_POST['nome']);
$sobrenome = $conn->real_escape_string($_POST['sobrenome']);
$cidade = $conn->real_escape_string($_POST['cidade']);
$estado = $conn->real_escape_string($_POST['estado']);
$cep = $conn->real_escape_string($_POST['cep']);
$numero_de_telefone = $conn->real_escape_string($_POST['numero_de_telefone']);
$email = $conn->real_escape_string($_POST['email']);

$sql = "INSERT INTO enderecos (endereco, numero_casa, complemento, pais, nome, sobrenome, cidade, estado, cep, numero_de_telefone, email)
        VALUES ('$endereco', '$numero_casa', '$complemento', '$pais', '$nome', '$sobrenome', '$cidade', '$estado', '$cep', '$numero_de_telefone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso";
    // Redirecionar apenas se a inserção foi bem-sucedida
    header("Location:pagamento.php");
    exit;
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();


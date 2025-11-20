<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = $_SESSION['id_usuario'] ?? null;

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../cadastro_de_usuarios.php/login.php');
}

$logado = $_SESSION['email'];
$nome = $_SESSION['nome'] ?? 'Usuário';
$nomeCompleto = $_SESSION['nome'] ?? '';
$primeiroNome = explode(
    ' ',
    $nomeCompleto
)[0];

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Destino</title>
</head>

<body>
    <h1>logastes jovem <u><?= htmlspecialchars($primeiroNome) ?>!</u></h1>

    <a href="sair.php">Sair</a>
</body>

</html>
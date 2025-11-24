<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = $_SESSION['id_usuario'] ?? null;


//busca foto do usuario no banco de dados
$foto_perfil = "../cinedestino/cadastro_de_usuarios/foto_nao_definida/default.png";

if ($id_usuario) {
    $consulta_foto = "SELECT foto_perfil FROM usuarios WHERE id = ?";
    $stmt = $mysqli->prepare($consulta_foto);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($foto);

    if ($stmt->fetch()) {

        if (!empty($foto)) {
            $foto_perfil = $foto;
        }
    }

    $stmt->close();
}

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: /cinedestino/cadastro_de_usuarios/login.php');
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

        <img src="../cinedestino/cadastro_de_usuarios/<?php echo htmlspecialchars($foto_perfil); ?>" alt="foto de perfil" width="100px">

    <a href="/cinedestino/cadastro_de_usuarios/sair.php">Sair</a>
</body>


</html>





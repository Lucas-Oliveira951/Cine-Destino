<?php
include_once("conexao.php");

if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $consulta_cadastro = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($consulta_cadastro);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "<p>Cadastro realizado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar!" . $stmt->error . "</p>";
    }

    $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
</head>

<body>
    <div class="box">
        <form action="formulario_de_cadastro.php" method="post">
            <h1>Crie sua conta gratuita</h1>
            <div class="inputBox">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Insira seu nome completo aqui." required>
            </div>
            <br>
            <div class="inputBox">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="inputUser" placeholder="Digite seu e-mail aqui." required>
            </div>
            <br>
            <div class="inputBox">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="inputUser" placeholder="Digite sua senha aqui." required>
            </div>
            <br>
            <input type="submit" id="enviar" name="enviar" value="Criar uma conta">

            <p>
                Já criou uma conta?
                <a href="login.php">Log in</a>
            </p>
        </form>
    </div>
</body>

</html>
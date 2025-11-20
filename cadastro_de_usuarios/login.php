<?php

include("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="teste_de_login.php" method="post">
        <h1>Entre na sua conta gratuita</h1>
        <p>
            <label for="">Email</label>
            <input type="text" class="email_senha" name="email" placeholder="Digite seu e-mail aqui">
        </p>
        <p>
            <label for="">Senha</label>
            <input type="password" class="email_senha" name="senha" placeholder="Digite sua senha aqui">
        </p>
        <p>
            <input type="submit" class="botao_enviar" name="submit" value="Entrar">
        </p>
        <p>
            Ainda não é cadastrado?
            <a href="formulario_de_cadastro.php">Cadastrar-se</a>
        </p>
    </form>

</body>

</html>
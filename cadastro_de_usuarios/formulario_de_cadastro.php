<?php
include_once("conexao.php");

if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $foto_perfil = "/foto_nao_definida/default.png";

    // verifica Se enviou uma foto
    if (!empty($_FILES['foto_perfil']['name'])) {
        $extensao = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png'];

        if (in_array($extensao, $permitidos)) {
            if ($_FILES['foto_perfil']['size'] <= 2 * 1024 * 1024) { // 2MB
                $arquivo = "foto_definida/" . uniqid() . "." . $extensao;

                if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $arquivo)) {
                    $foto_perfil = $arquivo; // salva caminho da foto
                } else {
                    echo "<p>Erro ao salvar a imagem.</p>";
                }
            } else {
                echo "<p>Arquivo muito grande. Tamanho máximo: 2MB.</p>";
            }
        } else {
            echo "<p>Formato inválido. Apenas JPG e PNG são permitidos.</p>";
        }
    }

    // consulta para salvar as informações do usuario no banco de dados
    $consulta_cadastro = "INSERT INTO usuarios (nome, email, senha, foto_perfil) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($consulta_cadastro);
    $stmt->bind_param("ssss", $nome, $email, $senha, $foto_perfil);

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
        <form action="formulario_de_cadastro.php" method="post" enctype="multipart/form-data">
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
            <p>Escolha uma foto para o seu perfil</p>
            <input type="file" name="foto_perfil" accept=".jpg,.jpeg,.png">
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

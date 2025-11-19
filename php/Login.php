<?php
session_start();
include "conexao.php";

$erro = "";

// Processa envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    // ---------------------------
    // LOGIN
    // ---------------------------
    if ($acao === "login") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();

            // Verificar senha
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario'] = $usuario['nome'];
                header("Location: home.php");
                exit;
            } else {
                $erro = "Senha incorreta!";
            }
        } else {
            $erro = "Email não encontrado!";
        }
    }

    // ---------------------------
    // CADASTRO
    // ---------------------------
    if ($acao === "cadastrar") {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verificar se já existe e-mail
        $check = $conn->query("SELECT id FROM usuarios WHERE email = '$email' LIMIT 1");

        if ($check->num_rows > 0) {
            $erro = "Este e-mail já está cadastrado!";
        } else {

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha)
                    VALUES ('$nome', '$email', '$senhaHash')";

            if ($conn->query($sql)) {
                $_SESSION['usuario'] = $nome;
                header("Location: home.php");
                exit;
            } else {
                $erro = "Erro ao cadastrar!";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CatDog</title>
<link href="https://fonts.cdnfonts.com/css/tt-fors-trial" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="../php/css/estilologin.php">
</head>
<body>

<div class="container" id="authBox">
    <h2 id="title">Login</h2>

    <?php if(!empty($erro)): ?>
        <p style="color:red; text-align:center;"><?= $erro ?></p>
    <?php endif; ?>

    <form method="POST" id="loginForm">
        <input type="hidden" name="acao" value="login">
        <div class="input-group">
            <label>Email:</label>
            <input type="email" name="email" required />
        </div>
        <div class="input-group">
            <label>Senha:</label>
            <input type="password" name="senha" required />
        </div>
        <button type="submit">Entrar</button>
        <div class="toggle" onclick="showCadastro()">Não tem conta? Cadastre-se</div>
    </form>

    <form method="POST" id="cadastroForm" style="display:none;">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="input-group">
            <label>Nome Completo:</label>
            <input type="text" name="nome" required />
        </div>
        <div class="input-group">
            <label>Email:</label>
            <input type="email" name="email" required />
        </div>
        <div class="input-group">
            <label>Senha:</label>
            <input type="password" name="senha" required />
        </div>
        <button type="submit">Cadastrar</button>
        <div class="toggle" onclick="showLogin()">Já tem conta? Entrar</div>
    </form>
</div>

<script>
function showCadastro(){
    document.getElementById('loginForm').style.display='none';
    document.getElementById('cadastroForm').style.display='block';
    document.getElementById('title').textContent='Cadastro';
}
function showLogin(){
    document.getElementById('cadastroForm').style.display='none';
    document.getElementById('loginForm').style.display='block';
    document.getElementById('title').textContent='Login';
}
</script>


</body>
</html>

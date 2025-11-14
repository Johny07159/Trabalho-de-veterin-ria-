
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CatDog</title>
<link href="https://fonts.cdnfonts.com/css/tt-fors-trial" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="css/Login.css">
</head>
<body>

<div class="container" id="authBox">
    <h2 id="title">Login</h2>

    <?php if($erro): ?>
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



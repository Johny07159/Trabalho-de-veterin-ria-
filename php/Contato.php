<?php
include "conexao.php"; 
$mensagem_enviada = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Inserir no banco de dados
    $sql = "INSERT INTO contato (nome, email, assunto, mensagem)
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if ($conn->query($sql)) {
        $mensagem_enviada = true;
    } else {
        echo "Erro ao enviar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato • CatDog</title>
    <link rel="stylesheet" href="../php/css/estilocontato.php">
</head>

<body>

    <!-- HEADER -->
    <header>
        <center><img src="<?php echo '../CatDog/img/Logo completa.png'; ?>" alt="Foto do Pet"></center>
    </header>

    <!-- NAV BAR -->
    <nav>
        <a href="../html/home.html">Home</a>
        <a href="../html/Sobre.html">Sobre</a>
        <a href="../html/Contato.php" class="active">Contato</a>
        <a href="../html/Login.html">Login</a>
    </nav>

    <!-- SESSÃO DE CONTATO -->
    <section class="contato-container">

        <h1>Fale Conosco</h1>
        <p class="subtexto">Estamos aqui para ajudar você e seu pet com carinho e atenção.</p>

        <div class="contato-box">

            <?php if ($mensagem_enviada): ?>
                <p style="color: green; font-weight: bold;">Mensagem enviada com sucesso!</p>
            <?php endif; ?>

            <form method="post" action="Contato.php">

                <div class="input-group">
                    <label>Seu Nome</label>
                    <input type="text" name="nome" placeholder="Digite seu nome" required>
                </div>

                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="exemplo@email.com" required>
                </div>

                <div class="input-group">
                    <label>Assunto</label>
                    <input type="text" name="assunto" placeholder="Sobre o que deseja falar?" required>
                </div>

                <div class="input-group">
                    <label>Mensagem</label>
                    <textarea name="mensagem" rows="5" placeholder="Digite sua mensagem..." required></textarea>
                </div>

                <button type="submit">Enviar Mensagem</button>

            </form>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-content">

            <div class="footer-about">
                <h3>Sobre Nós</h3>
                <p>Na CatDog, cuidamos do bem-estar de cães e gatos com amor e dedicação.</p>
            </div>

            <div class="footer-links">
                <h3>Links</h3>
                <ul>
                    <li><a href="../html/home.html">Início</a></li>
                    <li><a href="../html/Login.html">Login</a></li>
                    <li><a href="../html/Sobre.html">Sobre</a></li>
                    <li><a href="Contato.php">Contato</a></li>
                </ul>
            </div>

            <div class="footer-logo">
                <img src="<?php echo '../CatDog/img/Logo completa.png'; ?>" alt="Foto do Pet">
            </div>

        </div>

        <hr class="footer-divider">
        <p class="footer-copy">&copy; 2025 CatDog. Todos os direitos reservados.</p>

    </footer>

</body>

</html>

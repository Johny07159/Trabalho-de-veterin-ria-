<?php
session_start();

// Exemplo: verificar se o usuário está logado
$usuario_logado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós • CatDog</title>
    <link rel="stylesheet" href="../php/css/estilosobre.php">
</head>

<body>

    <!-- HEADER -->
    <header>
        <center><img src="<?php echo '../CatDog/img/Logo completa.png'; ?>" alt="Foto do Pet"></center>
    </header>

    <!-- NAVBAR -->
    <nav>
        <a href="../html/home.php">Home</a>
        <a href="../html/Sobre.php" class="active">Sobre</a>
        <a href="../html/Contato.php">Contato</a>
        <a href="../html/Login.php">Login</a>
        <?php if ($usuario_logado): ?>
            <span style="margin-left:20px;">Bem-vindo, <?= htmlspecialchars($usuario_logado) ?>!</span>
        <?php endif; ?>
    </nav>

    <!-- SESSÃO SOBRE -->
    <section class="sobre-container">

        <div class="sobre-box">

            <div class="sobre-texto">
                <h1>Sobre Nós</h1>
                <p>
                    A <strong>CatDog</strong> nasceu com o propósito de cuidar com carinho e dedicação dos nossos
                    melhores amigos: cães e gatos.
                </p>
                <p>
                    Nossa missão é oferecer um atendimento humanizado, acolhedor e seguro, proporcionando conforto
                    tanto para o pet quanto para o tutor. Trabalhamos diariamente para garantir saúde, bem-estar e
                    qualidade de vida aos animais.
                </p>
                <p>
                    Com profissionais capacitados e apaixonados pelo que fazem, acreditamos que cada animal merece um
                    cuidado especial — e é isso que oferecemos aqui.
                </p>
            </div>

        </div>

        <!-- CARDS DE VALORES -->
        <h2 class="valores-titulo">Nossos Valores</h2>

        <div class="valores-box">

            <div class="valor-card">
                <h3>Amor pelos Animais</h3>
                <p>Cuidamos com carinho, respeito e dedicação, como se fossem nossos.</p>
            </div>

            <div class="valor-card">
                <h3>Profissionalismo</h3>
                <p>Equipe altamente qualificada, sempre pronta para ajudar.</p>
            </div>

            <div class="valor-card">
                <h3>Atenção e Confiança</h3>
                <p>Escutamos o tutor e oferecemos suporte completo e transparente.</p>
            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-content">

            <div class="footer-about">
                <h3>Sobre Nós</h3>
                <p>Na CatDog, cuidamos do bem-estar de cães e gatos com amor e profissionalismo.</p>
            </div>

            <div class="footer-links">
                <h3>Links</h3>
                <ul>
                    <li><a href="../html/home.php">Início</a></li>
                    <li><a href="../html/Login.php">Login</a></li>
                    <li><a href="../html/Sobre.php">Sobre</a></li>
                    <li><a href="../html/Contato.php">Contato</a></li>
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

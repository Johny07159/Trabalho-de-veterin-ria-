<?php
header("Content-type: text/css");

// ======= Variáveis dinâmicas =======
$corHeader = "#e29313";
$corNavFundo = "#000";
$corNavHover = "#EC8C2C";
$corBotao = "#ffae2b";
$corBotaoHover = "#EC8C2C";
$corTextoSub = "#444";
$backgroundBody = "../img/fundo 2.jpg";
?>

/* Fundo padrão do site */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('<?= $backgroundBody ?>');
    background-repeat: no-repeat;
    background-size: 30%;
    background-position-x: 1300px;
    background-position-y: 1100px;
}

/* HEADER */
header {
    background-color: <?= $corHeader ?>;
    box-shadow: 0 0 12px rgba(0,0,0,0.9);
    padding: 10px 0;
}

#logo {
    width: 260px;
}

/* NAV BAR */
nav {
    width: 100%;
    background: <?= $corNavFundo ?>;
    padding: 10px 0;
    display: flex;
    gap: 35px;
    justify-content: center;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    padding: 8px 14px;
    border-radius: 6px;
    transition: .2s;
}

nav a:hover,
nav .active {
    background: <?= $corNavHover ?>;
}

/* SESSÃO DE CONTATO */
.contato-container {
    width: 90%;
    max-width: 1100px;
    margin: 50px auto;
    text-align: center;
}

.contato-container h1 {
    font-size: 34px;
    margin-bottom: 5px;
    color: #000;
}

.subtexto {
    color: <?= $corTextoSub ?>;
    margin-bottom: 40px;
}

.contato-box {
    display: flex;
    background: #fff;
    padding: 40px;
    border-radius: 14px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    gap: 40px;
}

form {
    width: 100%;
}

.input-group {
    text-align: left;
    margin-bottom: 18px;
}

.input-group label {
    font-weight: bold;
    margin-bottom: 6px;
    display: block;
}

.input-group input,
.input-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #bbb;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
}

button {
    width: 100%;
    padding: 14px;
    background: <?= $corBotao ?>;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: .2s;
}

button:hover {
    background: <?= $corBotaoHover ?>;
}

/* IMAGEM AO LADO */
.contato-img img {
    width: 330px;
    height: auto;
}

/* FOOTER */
.footer {
    background: <?= $corBotaoHover ?>;
    color: #fff;
    padding: 40px 0;
    margin-top: 60px;
}

.footer-content {
    max-width: 1100px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    padding: 0 20px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links a {
    color: white;
    text-decoration: none;
}

.footer-links a:hover {
    color: #60350a;
}

.footer-logo img {
    width: 130px;
}

.footer-divider {
    border-color: white;
    margin: 30px 0;
}

.footer-copy {
    text-align: center;
    font-size: 14px;
}

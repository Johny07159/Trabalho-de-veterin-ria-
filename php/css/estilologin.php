<?php
header("Content-type: text/css");

/* ======= Cores e estilos dinâmicos ======= */
$corPrimaria = "#EC8C2C";
$corSecundaria = "#c67321";
$corFundoInput = "rgba(255, 255, 255, 0.7)";
$corBordaInput = "#ffe7cf";
$corTextoLabel = "#3c2f1b";
$corSombraBotao = "rgba(236, 140, 44, 0.4)";
$corSombraBotaoHover = "rgba(236, 140, 44, 0.6)";
?>

/* ======= Fundo e Layout ======= */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: radial-gradient(circle at top left, #ffffff, #ffffff, #e3963f);
  background-attachment: fixed;
}

/* ======= Caixa com Glassmorphism ======= */
.container {
  width: 380px;
  padding: 40px 45px;
  border-radius: 18px;
  background: rgb(255, 255, 255);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 2px solid rgba(255, 255, 255, 0.35);
  box-shadow: 0 8px 25px rgb(0, 0, 0);
  animation: fadeIn .5s ease-out;
}

/* Animação suave */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ======= Título ======= */
h2 {
  text-align: center;
  font-size: 28px;
  color: <?= $corPrimaria ?>;
  font-weight: 800;
  margin-bottom: 20px;
  text-shadow: 0 0 8px rgba(236, 140, 44, 0.4);
}

/* ======= Inputs ======= */
.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 6px;
  color: <?= $corTextoLabel ?>;
}

.input-group input {
  width: 100%;
  padding: 14px;
  border-radius: 12px;
  border: 2px solid <?= $corBordaInput ?>;
  background: <?= $corFundoInput ?>;
  font-size: 15px;
  transition: .3s;
}

.input-group input:focus {
  border-color: <?= $corPrimaria ?>;
  box-shadow: 0 0 12px rgba(236, 140, 44, 0.6);
  outline: none;
  background: #fff;
}

/* ======= Botões ======= */
button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 12px;
  background: linear-gradient(135deg, <?= $corPrimaria ?>, <?= $corSecundaria ?>);
  color: white;
  font-size: 17px;
  font-weight: bold;
  cursor: pointer;
  letter-spacing: 0.5px;
  transition: .3s;
  box-shadow: 0 4px 12px <?= $corSombraBotao ?>;
}

button:hover {
  background: linear-gradient(135deg, #ff9f3c, #d67b1f);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px <?= $corSombraBotaoHover ?>;
}

/* ======= Texto para alternar entre Login/Cadastro ======= */
.toggle {
  text-align: center;
  margin-top: 15px;
  cursor: pointer;
  color: <?= $corPrimaria ?>;
  font-weight: bold;
  transition: .3s;
}

.toggle:hover {
  color: #bb5f1a;
  text-shadow: 0 0 6px rgba(236, 140, 44, 0.5);
}

/* ======= Home após login ======= */
#home {
  display: none;
  text-align: center;
}

#home h2 {
  color: <?= $corPrimaria ?>;
}

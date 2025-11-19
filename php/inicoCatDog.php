<?php
include "conexao.php";

// Processar cadastro do pet
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = htmlspecialchars($_POST['petNome']);
    $tipo = htmlspecialchars($_POST['petTipo']);
    $raca = htmlspecialchars($_POST['petRaca']);
    $idade = (int)$_POST['petIdade'];
    $sintomas = isset($_POST['sintomas']) ? implode(",", $_POST['sintomas']) : "";
    $sintomasExtras = htmlspecialchars($_POST['petSintomas']);
    $cuidados = htmlspecialchars($_POST['petCuidados']);

    // Foto
    $fotoNome = '';
    if (isset($_FILES['petFoto']) && $_FILES['petFoto']['error'] == 0) {
        $fotoNome = 'uploads/' . basename($_FILES['petFoto']['name']);
        move_uploaded_file($_FILES['petFoto']['tmp_name'], $fotoNome);
    }

    // Inserir no banco
    $sql = "INSERT INTO pets (nome, tipo, raca, idade, sintomas, sintomas_extras, cuidados, foto)
            VALUES ('$nome', '$tipo', '$raca', '$idade', '$sintomas', '$sintomasExtras', '$cuidados', '$fotoNome')";

    $conn->query($sql);
}

// Buscar pets cadastrados
$pets = [];
$result = $conn->query("SELECT * FROM pets ORDER BY id DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['sintomas'] = explode(",", $row['sintomas']);
        $pets[] = $row;
    }
}

?>


<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatDog</title>
    <link rel="stylesheet" href="../php/css/estiloglobal.php">
    <script src="../js/Home.js"></script>
</head>

<body>

    <header>
        <center><img src="<?php echo '../CatDog/img/Logo completa.png'; ?>" alt="Foto do Pet"></center>
    </header>

    <nav>
        <a href="../html/home.html">Home</a>
        <a href="../html/Sobre.html">Sobre</a>
        <a href="../html/Contato.html">Contato</a>
        <a href="../html/Login.html">Login</a>
    </nav>

    <div class="containe_Cadastrados">
        <h2>Cadastro de Pets</h2>

        <form method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nome do Pet:</label>
                <input type="text" name="petNome" required />
            </div>

            <div class="input-group">
                <label>Tipo do Pet:</label>
                <select name="petTipo" required>
                    <option value="">Selecione...</option>
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                </select>
            </div>

            <div class="input-group">
                <label>Raça:</label>
                <input type="text" name="petRaca" />
            </div>

            <div class="input-group">
                <label>Idade:</label>
                <input type="number" name="petIdade" />
            </div>

            <div class="input-group">
                <label>Foto do Pet:</label>
                <input type="file" name="petFoto" accept="image/*" />
            </div>

            <div class="input-group">
                <label>Sintomas do Animal:</label>
                <div style="margin-bottom:10px;">
                    <label><input type="checkbox" name="sintomas[]" value="tosse"> Tosse</label><br>
                    <label><input type="checkbox" name="sintomas[]" value="vomito"> Vômito</label><br>
                    <label><input type="checkbox" name="sintomas[]" value="diarreia"> Diarreia</label><br>
                    <label><input type="checkbox" name="sintomas[]" value="falta_apetite"> Falta de Apetite</label><br>
                    <label><input type="checkbox" name="sintomas[]" value="coceira"> Coceira</label><br>
                </div>
                <textarea name="petSintomas" rows="3" placeholder="Descreva outros sintomas..." style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>

                <textarea name="petCuidados" rows="3" placeholder="Cuidados Necessários" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>
            </div>

            <button type="submit">Cadastrar Pet</button>
        </form>

        <h3 style="margin-top:25px; text-align:center;">Pets Cadastrados</h3>
        <div class="pet-list">
            <?php if(!empty($pets)): ?>
                <?php foreach($pets as $pet): ?>
                    <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                        <p><strong>Nome:</strong> <?= $pet['nome'] ?></p>
                        <p><strong>Tipo:</strong> <?= $pet['tipo'] ?></p>
                        <p><strong>Raça:</strong> <?= $pet['raca'] ?></p>
                        <p><strong>Idade:</strong> <?= $pet['idade'] ?> anos</p>
                        <p><strong>Sintomas:</strong> <?= implode(", ", $pet['sintomas']) ?> <?= $pet['sintomasExtras'] ?></p>
                        <p><strong>Cuidados:</strong> <?= $pet['cuidados'] ?></p>
                        <?php if($pet['foto']): ?>
                            <img src="<?= $pet['foto'] ?>" style="max-width:100px;">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;">Nenhum pet cadastrado ainda.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-about">
                <h3>Sobre Nós</h3>
                <p>Na CatDog, cuidamos do bem-estar de cães e gatos com amor, atenção e profissionalismo.</p>
            </div>

            <div class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="./index.html">Início</a></li>
                    <li><a href="../html/Login.html">Login</a></li>
                    <li><a href="../html/Sobre.html">Sobre</a></li>
                    <li><a href="../html/Contato.html">Contato</a></li>
                </ul>
            </div>

            <div class="footer-logo">
                <img src="../img/Logo completa.png" alt="Cat Dog">
            </div>
        </div>

        <hr class="footer-divider">
        <p class="footer-copy">&copy; 2025 Cat Dog. Todos os direitos reservados.</p>
    </footer>

</body>

</html>

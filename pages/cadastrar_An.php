<?php 
include("config.php");
include("includes/header.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;

$nome = "";
$especie = "";
$idade = "";
$meta = '';
$porte = "";
$imagemAtual = "";

// 🔎 BUSCAR DADOS (EDIÇÃO)
if ($id) {

    $sql = "SELECT * FROM animais 
            WHERE id = '$id' AND usuario_id = '{$_SESSION['usuario']}'";

    $result = $conn->query($sql);
    $animal = $result->fetch_assoc();

    if ($animal) {
        $nome = $animal['nome'];
        $especie = $animal['especie'];
        $idade = $animal['idade'];
        $porte = $animal['porte'];
        $imagemAtual = $animal['imagem']; // ✔️ pega aqui
    }
}

// 💾 SALVAR
if ($_POST) {

    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $idade = $_POST['idade'];
    $meta = $_POST['meta'];
    $descricao = $_POST['descricao'];
    $porte = $_POST['porte'];

    // 👉 mantém imagem antiga
    $nomeImagem = $imagemAtual;

    // 👉 se enviou nova imagem
    if (!empty($_FILES['imagem']['name'])) {

        $imagem = $_FILES['imagem'];

        $nomeImagem = uniqid() . "." . pathinfo($imagem['name'], PATHINFO_EXTENSION);

        move_uploaded_file($imagem['tmp_name'], "uploads/" . $nomeImagem);
    }

    if ($id) {

        $sql = "UPDATE animais 
                SET nome='$nome', especie='$especie', idade='$idade', meta='$meta', porte='$porte', imagem='$nomeImagem', descricao='$descricao'
                WHERE id='$id' AND usuario_id='{$_SESSION['usuario']}'";

    } else {

        $sql = "INSERT INTO animais (nome, especie, idade, meta, descricao, imagem, usuario_id, porte)
                VALUES ('$nome', '$especie', '$idade','$meta' , '$descricao', '$nomeImagem', '{$_SESSION['usuario']}', '$porte')";
    }

    $conn->query($sql);

    header("Location: /AdotUmPet/dashboard");
    exit;
}
?>
<header class="page-header" data-aos="fade-down">
    <h1>Cadastrar Animal</h1>
    <p>Ajude um pet a encontrar um lar 🐶</p>
</header>
    <main>
        <section class="contact-area">
            <section class="contact-form-section">
                <form method="POST" enctype="multipart/form-data" class="contact-form">
                    <h2 data-aos="fade-right">Novo Pet</h2>
                    <!-- 🖼️ MOSTRAR IMAGEM -->
                    <?php if (!empty($imagemAtual)): ?>
                        <p>Imagem atual:</p>
                        <img src="uploads/<?php echo $imagemAtual; ?>" width="150"><br>
                    <?php endif; ?>

                    Imagem: <input type="file" name="imagem"><br>

                    Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>

                    Espécie: <input type="text" name="especie" value="<?php echo $especie; ?>"><br>

                    Idade: <input type="number" name="idade" value="<?php echo $idade; ?>"><br>

                    Descrição: <textarea name="descricao"><?php echo $descricao ?? ''; ?></textarea><br>
                    
                    <?php echo $id ? 'Meta: <input type="number" name="meta" value="'. $meta .'"><br>' : ""; ?>
                    

                    <label>Porte:</label>
                    <select name="porte">
                        <option value="Pequeno" <?= $porte == "Pequeno" ? "selected" : "" ?>>Pequeno</option>
                        <option value="Medio" <?= $porte == "Medio" ? "selected" : "" ?>>Médio</option>
                        <option value="Grande" <?= $porte == "Grande" ? "selected" : "" ?>>Grande</option>
                    </select><br>

                    <button type="submit" class="form-submit-button">
                        <?php echo $id ? "Atualizar" : "Cadastrar"; ?>
                    </button>

                </form>
            </section>
        </section>
    </main>
<?php include("includes/footer.php");?>
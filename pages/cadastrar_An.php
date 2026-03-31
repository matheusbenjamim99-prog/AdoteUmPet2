<?php include("config.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
$id = $_GET['id'] ?? null;

$nome = "";
$especie = "";
$idade = "";
$porte = "";

if ($id) {

    $sql = "SELECT * FROM animais 
            WHERE id = '$id' AND usuario_id = '{$_SESSION['usuario']}'";

    $result = $conn->query($sql);
    $animal = $result->fetch_assoc();

    $nome = $animal['nome'];
    $especie = $animal['especie'];
    $idade = $animal['idade'];
    $porte = $animal['porte'];
}

if ($_POST) {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['imagem'];
    $usuario_id = $_SESSION['usuario'];
    $porte = $_POST['porte'];

    $nomeImagem = time() . "_" . $imagem['name'];
    $caminho = "uploads/" . $nomeImagem;

    move_uploaded_file($imagem['tmp_name'], $caminho);

    $sql = "INSERT INTO animais (nome, especie, idade, descricao,imagem , usuario_id, porte)
            VALUES ('$nome', '$especie', '$idade', '$descricao', '$nomeImagem' , '$usuario_id', '$porte')";

    if ($conn->query($sql)) {
        echo "Animal cadastrado!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    Imagem<input type="file" name="imagem"><br>
    Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
    Espécie: <input type="text" name="especie" value="<?php echo $especie; ?>"><br>
    Idade: <input type="number" name="idade" value="<?php echo $idade; ?>"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    <label>Porte:</label>
    <select name="porte">
        <option value="Pequeno" <?= $porte == "Pequeno" ? "selected" : "" ?>>Pequeno</option>
        <option value="Medio" <?= $porte == "Medio" ? "selected" : "" ?>>Médio</option>
        <option value="Grande" <?= $porte == "Grande" ? "selected" : "" ?>>Grande</option>
    </select><br>
    <button type="submit">
        <?php echo $id ? "Atualizar" : "Cadastrar"; ?>
    </button>
</form>
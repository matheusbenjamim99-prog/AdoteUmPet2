<?php include("config.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

if ($_POST) {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];
    $usuario_id = $_SESSION['usuario'];

    $sql = "INSERT INTO animais (nome, especie, idade, descricao, usuario_id)
            VALUES ('$nome', '$especie', '$idade', '$descricao', '$usuario_id')";

    if ($conn->query($sql)) {
        echo "Animal cadastrado!";
    }
}
?>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Espécie: <input type="text" name="especie"><br>
    Idade: <input type="number" name="idade"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    <button type="submit">Cadastrar</button>
</form>
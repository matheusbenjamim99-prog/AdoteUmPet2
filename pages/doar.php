<?php 
include("config.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login");
    exit;
}

$animal_id = $_GET['id'];
$usuario_id = $_SESSION['usuario'];

if ($_POST) {

    $valor = $_POST['valor'];

    $sql = "INSERT INTO doacoes (usuario_id, animal_id, valor)
            VALUES ('$usuario_id', '$animal_id', '$valor')";

    if ($conn->query($sql)) {
        echo "Obrigado por apadrinhar ❤️";
    }
}
?>

<h2>💰 Fazer doação</h2>

<form method="POST">
    Valor: <input type="number" name="valor" step="0.01"><br>
    <button type="submit">Doar</button>
</form>

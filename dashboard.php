<?php include("config.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>

<h2>Bem-vindo!</h2>

<a href="cadastrar_An.php">Cadastrar Animal</a><br>
<a href="listar_An.php">Ver Animais</a><br>
<a href="logout.php">Sair</a>
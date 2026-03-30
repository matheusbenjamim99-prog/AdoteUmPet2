<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "adocao_animais";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

session_start();

define("BASE_URL", "http://localhost/AdotUmPet/");

?>
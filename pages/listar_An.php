<?php include("config.php");

$sql = "SELECT * FROM animais";
$result = $conn->query($sql);

while ($animal = $result->fetch_assoc()) {
    echo "<h3>" . $animal['nome'] . "</h3>";
    echo "Espécie: " . $animal['especie'] . "<br>";
    echo "Idade: " . $animal['idade'] . "<br>";
    echo "Descrição: " . $animal['descricao'] . "<hr>";
}
?>
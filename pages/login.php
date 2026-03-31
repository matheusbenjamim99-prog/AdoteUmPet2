<?php include("config.php");

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            header("Location: dashboard");
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <button type="submit">Entrar</button>
</form>
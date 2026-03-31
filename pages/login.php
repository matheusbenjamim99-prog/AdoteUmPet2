<?php include("config.php");
include("includes/header.php");

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
<header class="page-header" data-aos="fade-down">
    <h1>Login</h1>
    <p>Entre na sua conta para continuar ajudando nossos pets 🐶</p>
</header>
<main>
    <section class="contact-area">
        <section class="contact-form-section">
            <form method="POST" class="contact-form">
                <h2 data-aos="fade-right">Acessar Conta</h2>
                Email: <input type="email" name="email"><br>
                Senha: <input type="password" name="senha"><br>
                <a href="cadastro">Cadastrar</a><br>
            <button type="submit" class="form-submit-button">Entrar</button>
            </form>
        </section>
    </section>
</main>
<?php include("includes/footer.php")?>
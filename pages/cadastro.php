<?php include("config.php");
include('includes/header.php');
if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha)
            VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql)) {
        echo "Usuário cadastrado!";
    } else {
        echo "Erro!";
    }
}
?>

<main>
    <section class="contact-area">
        <section class="contact-form-section">
            <form method="POST" class="contact-form">
                Nome: <input type="text" name="nome"><br>
                Email: <input type="email" name="email"><br>
                Senha: <input type="password" name="senha"><br>
                <button type="submit" class="form-submit-button">Cadastrar</button>
            </form>
        </section>
    </section>
</main>
<?php include("includes/footer.php");
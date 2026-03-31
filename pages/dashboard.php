<?php include("config.php");
include('includes/header.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: login");
    exit;
}
$usuario_id = $_SESSION['usuario'];
$nome = $_SESSION['nome'];

$sql = "SELECT * FROM animais WHERE usuario_id = '$usuario_id'";
$result = $conn->query($sql);

?>

<h2>Bem-vindo, <?php echo $nome; ?> 👋</h2>

<a href="animais/cadastrar">Cadastrar Animal</a><br>

<h3>Seus animais 🐾</h3>

<main>
    <section class="contact-area">
        <div class="contact-info-grid">
            <?php if ($result->num_rows > 0): ?>

                <?php while ($animal = $result->fetch_assoc()): ?>
                    <div class="contact-box">
                        <h3><?php echo $animal['nome']; ?></h3>
                        <p><strongEspécie:></strong> <?php echo $animal['especie']; ?></p>
                        <p><strong>Espécie:</strong> <?php echo $animal['idade']; ?></p>

                        <br>
                        <a href="editar_animal.php?id=<?php echo $animal['id']; ?>" class="form-submit-button">
                            Editar
                        </a>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <p>Você ainda não cadastrou animais.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php include('includes/footer.php'); ?>
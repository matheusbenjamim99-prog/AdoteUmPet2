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
                    <section class="pet-gallery" id="petGalleryContainer" data-aos="fade-up">
                        <div class="pet-card sponsor-card" data-pet-id="TONY" data-goal="150" data-current="45" data-aos="fade-up">
                            <?php echo "<img src='uploads/" . $animal['imagem'] . "' width='200'>"; ?>
                            <h2><?php echo $animal['nome']; ?></h2>
                            <p><strong>Espécie:</strong> <?php echo $animal['especie']; ?></p>
                            <p><strong>Idade:</strong> <?php echo $animal['idade']; ?></p>
                            <p><strong>Porte:</strong> <?php echo $animal['porte']; ?></p>
                            <p><strong>Descrição:</strong> <?php echo $animal['descricao']; ?></p>
                            <br>
                            <a href="animais/cadastrar?id=<?php echo $animal['id']; ?>" class="whatsapp-button sponsor-button">Editar</a>

                        </div>
                    </section>
                <?php endwhile; ?>

            <?php else: ?>
                <p>Você ainda não cadastrou animais.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php include('includes/footer.php'); ?>
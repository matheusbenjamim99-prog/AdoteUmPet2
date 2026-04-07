<?php
include('config.php'); 
include('includes/header.php');

$sql = "SELECT * FROM animais WHERE status = 'Adotado'";
$ano = $_GET['ano'] ?? 'all';
$busca = $_GET['busca'] ?? '';

if ($ano != 'all') {
    $sql .= " AND YEAR(data_adocao) = '$ano'";
}
if (!empty($busca)) {
    $sql .= " AND (nome LIKE '%$busca%' OR historia LIKE '%$busca%')";
}
$result = $conn->query($sql);
?>


<header class="page-header" data-aos="fade-down">
    <h1>Nossos Finais Felizes</h1>
    <p>A prova de que a adoção muda vidas: conheça os pets que já encontraram seus lares!</p>
</header>

<main>
    <div class="filter-bar">
        <form method="GET" class="filter-bar">

    <label for="filter-year">Filtrar por Ano:</label>
    <select name="ano" id="filter-year">
        <option value="all">Todos os Anos</option>

        <!-- exemplos fixos (ou dinâmicos depois) -->
        <option value="2026">2026</option>
        <option value="2025">2025</option>
    </select>

    <label for="search-name">Buscar por Nome:</label>
    <input type="text" name="busca" placeholder="Nome do pet ou adotante...">

    <button class="cta-button secondary-cta-button small-btn">Filtrar</button>

</form>
    </div>

    <section class="success-gallery" id="successStoriesContainer">
        <?php while ($animal = $result->fetch_assoc()): ?>
        <div class="story-card" data-date="2025-06-15" data-name="Thor" data-adopter="Ana">
            <div class="swiper storySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <?php echo "<img src='uploads/" . $animal['imagem'] . "' width='300'>"; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="story-details">
                <span class="story-date">Adotado em <?php 
                    if (!empty($animal['data_adocao'])) {
                        echo date("d/m/Y", strtotime($animal['data_adocao']));
                    } else {
                        echo "Data não informada";
                    }
                    ?></span>
                <h2><?php echo $animal['nome'];?></h2>
                <p class="adopter-credit">Adotado por: {{ c.adotadoPor }}</p>
                <blockquote class="story-text">
                    <p><?php echo $animal['historia'];?></p>
                </blockquote>
                <a href="contact.html?story=thor" class="secondary-cta-button small-btn">Compartilhar História</a>
            </div>
        </div>
        <div class="no-stories-feedback" style="display: none;">
            <p>Nenhuma história encontrada com os critérios de filtro.</p>
        </div>
        <?php endwhile; ?>
    </section>

</main>

<footer class="main-footer">
</footer>

<a href="https://api.whatsapp.com/send?phone=5585996991515&text=Olá! Gostaria de informações gerais sobre a adoção e o projeto Caminho do Nosso Lar."
    target="_blank" class="whatsapp-float" aria-label="Fale Conosco pelo WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php include('includes/footer.php');?>
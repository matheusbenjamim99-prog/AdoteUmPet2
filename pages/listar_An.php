<?php include("config.php");
include("includes/header.php");
$sql = "SELECT * FROM animais";
$result = $conn->query($sql);
?>
<header class="page-header" data-aos="fade-down">
    <h1>Adote um Amigo para a Vida</h1>
    <p>Use nossos filtros para encontrar o pet que se encaixa perfeitamente no seu lar e rotina.</p>
</header>

<main>
    <form method="GET" class="filter-controls" data-aos="fade-right">
        <section class="filter-input" data-aos="fade-right">
        <label for="filterSpecies">Espécie:</label>
        <select id="filterSpecies" class="filter-input" data-filter="species" name="especie">
            <option value="all">Todos</option>
            <option value="cachorro">cachorro</option>
            <option value="gato">gato</option>
        </select>

        <label for="filterSize">Porte:</label>
        <select id="filterSize" class="filter-input" data-filter="size" name="porte">
            <option value="all">Todos</option>
            <option value="pequeno">Pequeno</option>
            <option value="medio">Médio</option>
            <option value="grande">Grande</option>
        </select>

        <button class="cta-button secondary-cta-button small-btn">Filtrar</button>
    </form>
    
    </section>
    <?php 
        while ($animal = $result->fetch_assoc()) {

            echo '<section class="pet-gallery" id="petGalleryContainer" data-aos="fade-up">';
                echo '<div class="pet-card sponsor-card" data-pet-id="TONY" data-goal="150" data-current="45" data-aos="fade-up">';
                    echo "<img src='uploads/" . $animal['imagem'] . "' width='200'><br>";
                    echo "<h2>" . $animal['nome'] . "</h2>";
                    echo "<small>ONG Parceira: Abrigo Coração Amigo</small>";
                    echo '<p>🐾 <strong>Espécie:</strong>'  . $animal["especie"] . ' | 🗓️ <strong>Idade:</strong> '. $animal['idade'] .' anos</p>';
                    echo '<p class="description">' . $animal['descricao'] . "</p>";
                    echo '<a href="https://api.whatsapp.com/send?phone=5585996991515&text=Olá! Quero apadrinhar o Tony e ajudar com seu tratamento."
                    target="_blank" class="whatsapp-button sponsor-button">
                    Quero Adotar ' . $animal['nome'] . '!
                </a>';
                echo '</div>';
            echo '</section>';  
        }
    ?>
    <div class="no-pets-feedback">
        <i class="fas fa-search-minus"></i>
        <p>Ops! Nenhum pet encontrado com os filtros selecionados.</p>
    </div>

    <div class="pagination-controls" id="paginationControls">
    </div>

</main>

<footer class="main-footer">
</footer>

<a href="https://api.whatsapp.com/send?phone=5585996991515&text=Olá! Gostaria de informações gerais sobre a adoção e o projeto Caminho do Nosso Lar."
    target="_blank" class="whatsapp-float" aria-label="Fale Conosco pelo WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="pets-data.js"></script>
<script src="renderer.js"></script>
</body>
<?php include("includes/footer.php");?>
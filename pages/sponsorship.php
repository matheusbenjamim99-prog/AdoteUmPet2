<?php 
include("config.php");
include("includes/header.php");

$sql = "SELECT * FROM animais WHERE status = 'Disponivel'";;
$result = $conn->query($sql);
?>

<header class="page-header" data-aos="fade-down">
    <h1>Apadrinhe um Anjo: Ajuda Contínua</h1>
    <p>Nem todos os pets podem ser adotados rapidamente. Ofereça um apoio financeiro mensal para garantir saúde e
        bem-estar!</p>
</header>

<main class="pet-gallery">

    <section class="bank-donation-highlight" data-aos="zoom-in"
        style="width: 100%; text-align: center; margin-bottom: 40px; background-color: var(--bg-secondary); padding: 30px; border-radius: 12px; border-left: 5px solid var(--color-primary);">
        <h2>Faça uma Doação Pontual</h2>
        <p style="font-size: 1.1em; margin-bottom: 20px;">Use os dados abaixo para uma transferência de qualquer valor.
        </p>
        <div
            style="max-width: 400px; margin: 0 auto; padding: 15px; background-color: var(--bg-main); border-radius: 8px; border: 1px solid var(--color-border);">
            <p><strong>Banco:</strong> Banco do Brasil</p>
            <p><strong>Agência:</strong> 0000-0</p>
            <p><strong>Conta Corrente:</strong> 00000-0</p>
            <p><strong>Nome:</strong> Instituto Causa Pet</p>
            <p style="margin-top: 10px; color: var(--color-secondary);">Chave PIX pode ser solicitada via WhatsApp</p>
        </div>
    </section>
</main>

<?php while ($animal = $result->fetch_assoc()): ?>
    <?php 
        $sqlTotal = "SELECT SUM(valor) as total 
             FROM doacoes 
             WHERE animal_id = " . $animal['id'];

    $resultTotal = $conn->query($sqlTotal);
    $total = $resultTotal->fetch_assoc()['total'] ?? 0;
    $meta = $animal['meta'];
    $porcentagem = ($meta > 0) ? ($total / $meta) * 100 : 0;

    // limitar até 100%
    if ($porcentagem > 100) {
        $porcentagem = 100;
    }    
    ?>
    
    <section class="pet-gallery" id="petGalleryContainer" data-aos="fade-up">
        <div class="pet-card sponsor-card" data-pet-id="TONY" data-goal="150" data-current="45" data-aos="fade-up">

        <img src="uploads/<?php echo $animal['imagem']; ?>" width="300"><br>
        <h2><?php echo $animal['nome']; ?></h2>
        <p>🐾 <strong>Espécie:</strong> <?php echo $animal['especie']; ?> | 🗓️ <strong>Idade:</strong> <?php echo $animal['idade']; ?> anos</p>
        <p><?php echo $animal['descricao']; ?></p>

        <?php 
            echo "
                <div style='width:300px; background:#eee; border-radius:20px; overflow:hidden; justify-content: center;'>
                    <div style='width:{$porcentagem}%; background:#4CAF50; color:white; padding:8px; text-align:center;'>
                        " . round($porcentagem) . "%
                    </div>
                </div>
                ";
        ?>

        <a href="doar?id=<?php echo $animal['id']; ?>" target="_blank" class="whatsapp-button sponsor-button">
            Apadrinhar
        </a>
        
    </div>
    </section>

<?php endwhile; 
include("includes/footer.php");
?>

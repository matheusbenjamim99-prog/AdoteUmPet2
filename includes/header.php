<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?? "Sistema"; ?></title>

    <meta name="description"
        content="O Caminho do Nosso Lar une ONGs, protetores e voluntários para salvar vidas. Encontre seu novo amigo, apadrinhe um pet ou seja um voluntário em Fortaleza, CE.">

    <meta property="og:title" content="Caminho do Nosso Lar: Salvar Vidas e Encontrar o Lar Perfeito">
    <meta property="og:image" content="https://seusite.com.br/assets/logo-caminho-do-lar.jpg">
    <meta property="og:url" content="https://seusite.com.br/index.html">
    <meta property="og:type" content="website">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/index.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body id="top"> 
    <button class="theme-switch" aria-label="Alternar Modo Escuro">🌞</button>

    <nav>
        <div class="nav-container">
            <a href="home" class="logo-text"
                style="font-weight: 700; color: var(--color-secondary); font-size: 1.5em;">Caminho do Nosso Lar</a>
            <button class="hamburger" aria-label="Abrir Menu Principal">☰</button>
            <ul>
                <li><a href="home" class="nav-link active">Nossa Missão</a></li>
                <li><a href="animais" class="nav-link">Adote Aqui</a></li>
                <li><a href="{% url 'sponsorship' %}" class="nav-link">Apadrinhamento</a></li>
                <li><a href="{% url 'success' %}" class="nav-link">Finais Felizes</a></li>
                <li><a href="{% url 'contact' %}" class="nav-link">Contato</a></li>
            </ul>
        </div>
    </nav>
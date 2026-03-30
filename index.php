<?php
$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        include 'pages/home.php';
        break;

    case 'login':
        include 'pages/login.php';
        break;

    case 'cadastro':
        include 'pages/cadastro.php';
        break;

    case 'animais':
        include 'pages/listar_animais.php';
        break;

    case 'animais/cadastrar':
        include 'pages/cadastrar_animal.php';
        break;

    default:
        echo "Página não encontrada";
}
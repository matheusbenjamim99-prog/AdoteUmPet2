<?php
$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        include 'pages/home.php';
        break;

    case 'login':
        include 'pages/login.php';
        break;

    case 'logout':
        include 'pages/logout.php';
        break;

    case 'cadastro':
        include 'pages/cadastro.php';
        break;

    case 'animais':
        include 'pages/listar_An.php';
        break;

    case 'animais/cadastrar':
        include 'pages/cadastrar_An.php';
        break;
    
    case 'dashboard':
        include 'pages/dashboard.php';
        break;

    case 'sponsorship':
        include 'pages/sponsorship.php';
        break;

    case 'doar':
        include 'pages/doar.php';
        break;

    default:
        echo "Página não encontrada";
}
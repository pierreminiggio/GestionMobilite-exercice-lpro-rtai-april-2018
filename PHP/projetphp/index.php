<?php // Démarrage application

// Initialiser l'application web
if (isset($_POST['controleur']) && isset($_POST['action'])) {
    $controleur = $_POST['controleur'];
    $action = $_POST['action'];
}
else {
    $controleur = 'demarrage';
    $action = 'accueil';
}

// Affichage principal
include_once('layout.php');
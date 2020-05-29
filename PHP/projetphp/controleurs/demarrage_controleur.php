<?php

class demarrageControleur {
    
    // La page d'accueil
    public function accueil() {
        require_once 'vues/demarrage_vue.php';
    }
    
    // En cas d'erreur
    public function erreur() {
        require_once 'vues/erreur_vue.php';
    }
}


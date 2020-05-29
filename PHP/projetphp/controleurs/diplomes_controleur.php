<?php

class diplomesControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/diplome_modele.php';
        $diplomes = Diplome::show();
        require_once 'vues/diplomes/diplomes_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/diplome_modele.php';
        require_once 'vues/diplomes/diplomes_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/diplome_modele.php';
        Diplome::add();
        $diplomes = Diplome::show();
        require_once 'vues/diplomes/diplomes_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/diplome_modele.php';
        Diplome::delete();
        $diplomes = Diplome::show();
        require_once 'vues/diplomes/diplomes_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/diplome_modele.php';
        Diplome::update();
        $diplomes = Diplome::show();
        require_once 'vues/diplomes/diplomes_update_vue.php';
    }
    
    // Trouve un élement en fonction de l'université
    public function findU() {
        require_once 'modeles/diplome_modele.php';
        $diplomes = Diplome::findU();
        require_once 'vues/diplomes/nomU_vue.php';
        require_once 'vues/diplomes/diplomes_vue.php';
        
    }

}


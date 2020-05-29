<?php

class universitesControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/universite_modele.php';
        $universites = Universite::show();
        require_once 'vues/universites/universites_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/universite_modele.php';
        require_once 'vues/universites/universites_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/universite_modele.php';
        Universite::add();
        $universites = Universite::show();
        require_once 'vues/universites/universites_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/universite_modele.php';
        Universite::delete();
        $universites = Universite::show();
        require_once 'vues/universites/universites_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/universite_modele.php';
        Universite::update();
        $universites = Universite::show();
        require_once 'vues/universites/universites_update_vue.php';
    }

}


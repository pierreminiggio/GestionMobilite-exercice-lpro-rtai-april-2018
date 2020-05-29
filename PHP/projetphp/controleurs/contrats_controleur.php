<?php

class contratsControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/contrat_modele.php';
        $contrats = Contrat::show();
        require_once 'vues/contrats/contrats_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/contrat_modele.php';
        require_once 'vues/contrats/contrats_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/contrat_modele.php';
        Contrat::add();
        $contrats = Contrat::show();
        require_once 'vues/contrats/contrats_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/contrat_modele.php';
        Contrat::delete();
        $contrats = Contrat::show();
        require_once 'vues/contrats/contrats_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/contrat_modele.php';
        Contrat::update();
        $contrats = Contrat::show();
        require_once 'vues/contrats/contrats_update_vue.php';
    }
    
    // Trouve un élement en fonction de l'université
    public function findU() {
        require_once 'modeles/contrat_modele.php';
        $contrats = Contrat::findU();
        require_once 'vues/contrats/nomU_vue.php';
        require_once 'vues/contrats/contrats_vue.php';
        
    }

}


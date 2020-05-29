<?php

class coursControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/cours_modele.php';
        $cours = Cours::show();
        require_once 'vues/cours/cours_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/cours_modele.php';
        require_once 'vues/cours/cours_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/cours_modele.php';
        Cours::add();
        $cours = Cours::show();
        require_once 'vues/cours/cours_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/cours_modele.php';
        Cours::delete();
        $cours = Cours::show();
        require_once 'vues/cours/cours_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/cours_modele.php';
        Cours::update();
        $cours = Cours::show();
        require_once 'vues/cours/cours_update_vue.php';
    }
    
    // Trouve un élement en fonction du diplôme
    public function findD() {
        require_once 'modeles/cours_modele.php';
        $cours = Cours::findD();
        require_once 'vues/cours/intituleDip_vue.php';
        require_once 'vues/cours/cours_par_dip_vue.php';
        
    }
    
    // Affiche le formulaire de programmation
    public function progform() {
        require_once 'modeles/cours_modele.php';
        require_once 'vues/cours/cours_progform_vue.php';
    }
    
    // Ajoute un cours à un diplome
    public function prog() {
        require_once 'modeles/cours_modele.php';
        Cours::prog();
        $cours = Cours::findD();
        require_once 'vues/cours/intituleDip_vue.php';
        require_once 'vues/cours/cours_par_dip_vue.php';
    }
    
    // Enlève un cours à un diplome
    public function deprog() {
        require_once 'modeles/cours_modele.php';
        Cours::deprog();
        $cours = Cours::findD();
        require_once 'vues/cours/intituleDip_vue.php';
        require_once 'vues/cours/cours_par_dip_vue.php';
    }

}


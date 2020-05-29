<?php

class programmesControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/programme_modele.php';
        $programmes = Programme::show();
        require_once 'vues/programmes/programmes_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/programme_modele.php';
        require_once 'vues/programmes/programmes_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/programme_modele.php';
        Programme::add();
        $programmes = Programme::show();
        require_once 'vues/programmes/programmes_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/programme_modele.php';
        Programme::delete();
        $programmes = Programme::show();
        require_once 'vues/programmes/programmes_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/programme_modele.php';
        Programme::update();
        $programmes = Programme::show();
        require_once 'vues/programmes/programmes_update_vue.php';
    }

}


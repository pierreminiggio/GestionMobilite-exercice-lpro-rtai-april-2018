<?php

class etudiantsControleur{
    
    // Affiche tout
    public function show() {
        require_once 'modeles/etudiant_modele.php';
        $etudiants = Etudiant::show();
        require_once 'vues/etudiants/etudiants_vue.php';
    }
    
    // Affiche le formulaire d'ajout
    public function addform() {
        require_once 'modeles/etudiant_modele.php';
        require_once 'vues/etudiants/etudiants_addform_vue.php';
    }
    
    // Ajoute un élément
    public function add() {
        require_once 'modeles/etudiant_modele.php';
        Etudiant::add();
        $etudiants = Etudiant::show();
        require_once 'vues/etudiants/etudiants_add_vue.php';
    }
    
    // Supprime un élément
    public function delete() {
        require_once 'modeles/etudiant_modele.php';
        Etudiant::delete();
        $etudiants = Etudiant::show();
        require_once 'vues/etudiants/etudiants_delete_vue.php';
    }
    
    // Met à jour un élément
    public function update() {
        require_once 'modeles/etudiant_modele.php';
        Etudiant::update();
        $etudiants = Etudiant::show();
        require_once 'vues/etudiants/etudiants_update_vue.php';
    }

}


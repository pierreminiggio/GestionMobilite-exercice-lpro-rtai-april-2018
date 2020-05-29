<?php
// Controleur principal, sert à "router" les instructions vers le contrôleur concerné

// Une fonction pour appeler/créer le bon contrôleur
function call($ctrl, $act) {
    // Correspondance parametre-fichier controleur
    include_once 'controleurs/'.$ctrl.'_controleur.php';
    
    // Créer une instance du contrôleur
    switch ($ctrl) {
        case 'demarrage':
            $control = new demarrageControleur();
            break;
        
        case 'diplomes':
            $control = new diplomesControleur();
            break;
        
        case 'programmes':
            $control = new programmesControleur();
            break;
        
        case 'cours':
            $control = new coursControleur();
            break;
        
        case 'etudiants':
            $control = new etudiantsControleur();
            break;
        
        case 'universites':
            $control = new universitesControleur();
            break;
        
        case 'contrats':
            $control = new contratsControleur();
            break;
    }
    
    // Faire l'action du contrôleur
    $control->{$act}();
}

// Un registre des contrôleurs
$controleurs = array(
    'demarrage' => ['accueil', 'erreur'],
    'diplomes' => ['show', 'addform', 'add', 'delete', 'update', 'findU'],
    'programmes' => ['show', 'addform', 'add', 'delete', 'update'],
    'cours' => ['show', 'addform', 'add', 'delete', 'update', 'findD', 'progform', 'prog', 'deprog'],
    'etudiants' => ['show', 'addform', 'add', 'delete', 'update'],
    'universites' => ['show', 'addform', 'add', 'delete', 'update'],
    'contrats' => ['show', 'addform', 'add', 'delete', 'update', 'findU']
    );

// La routine de routage
 
// Vérifier la validité du controleur et de l'action
// Si erreur on redirige vers erreur

// Variable $controleur et $action vont arriver du formulaire
if (array_key_exists($controleur, $controleurs)) {
    if (in_array($action, $controleurs[$controleur])) {
        
        // Le contrôleur et l'action sont valides
        call ($controleur, $action);
    }
    else {
        // Action non-valide
        call('demarrage', 'erreur');
    }
}
else {   
    // Contrôleur non-valide
        call('demarrage', 'erreur');
    }
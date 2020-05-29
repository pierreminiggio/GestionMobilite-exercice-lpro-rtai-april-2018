<style>
    table form input {
        text-align: center;
    }
</style>

<script>  
            function getform(idligne, nomEt, prenomEt, email, cv, codeDip) {
                
                // la liste des diplomes pour remplir les options du select
                <?php
                    include_once 'utils.php';
                    $conn = Utils::connecter();

                    $sql = 'SELECT codeDip, intituleDip FROM diplomes;';
                    $result = Utils::querySQL($sql, $conn);
                    echo "var options = '";   
                    foreach ($result-> fetchAll() as $u) {
                        echo '<option id="optiond'.$u['codeDip'].'" value="'.$u['codeDip'].'">'.$u['intituleDip'].'</option>';
                    }
                    echo "';";
                    Utils::deconnecter($conn);
                ?>
                
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="etudiants"><input type="hidden" name="action" value="update"><input type="hidden" name="numEtudiant" value="'+idligne+'"><div class="row"><div class="col s12 m6">Nom de l\'étudiant : <input type="text" name="nomEt" placeholder="Nom de l\'étudiant" value="'+nomEt+'"></div><div class="col s12 m6">Prénom de l\'étudiant : <input type="text" name="prenomEt" placeholder="Prénom de l\'étudiant" value="'+prenomEt+'"></div><div class="col s12 m6">Email : <input type="text" name="email" placeholder="Email" value="'+email+'"></div><div class="col s12 m6">CV : <input type="text" name="cv" placeholder="CV" value="'+cv+'"></div><div class="col s12 m6 offset-m3">Diplôme : <select name="codeDip" class="browser-default black-text">'+options+'</select></div><input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                var optionselected = '#optiond' + codeDip;
                
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="7"><h3>Modification de l\'étudiant n°'+idligne+'</h3>'+form+'</td></tr>');
                    $(optionselected).attr('selected','selected');
                    $(idbtn).html('Réduire');
                }
                else {
                    $(formid).remove();
                    $(idbtn).html('Modifier');
                }   
            }
            
            function vraiment(code) {
                var idbtnsup = '#supprimer' + code;
                var formdelid = '#formdel' + code;
                if ($(idbtnsup).html() == 'Supprimer') {
                    $(idbtnsup).html('Vraiment supprimer?');
                    $(idbtnsup).addClass('red');
                }
                else {
                    $(formdelid).submit();
                }
            }
</script>

<?php

echo '<h1>Listes des Étudiants</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'etudiants\', \'addform\')">+ Ajouter un étudiant</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Numéro de l\'étudiant</th><th>Nom de l\'étudiant</th><th>Prénom de l\'étudiant</th><th>Adresse email</th><th>CV</th><th>Diplôme</th><th>Actions</th></tr>';
$nbe = 0;
foreach ($etudiants as $e) {
    $nbe++;
    echo '<tr class="ligne" id="ligne'.$e->numEtudiant.'">';
    echo '<td class="search" id="search'.$e->numEtudiant.'">'.$e->numEtudiant.'</td>';
    echo '<td class="search" id="search'.$e->numEtudiant.'">'.$e->nomEt.'</td>';
    echo '<td class="search" id="search'.$e->numEtudiant.'">'.$e->prenomEt.'</td>';
    echo '<td class="search" id="search'.$e->numEtudiant.'"><a href="mailto:'.$e->email.'">'.$e->email.'</a></td>';
    echo '<td class="search" id="search'.$e->numEtudiant.'"><a href="'.$e->cv.'" target="blank">'.$e->cv.'</a></td>';
    echo '<td class="search" id="search'.$e->numEtudiant.'">'.$e->intituleDip.'</td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$e->numEtudiant.', \''.$e->nomEt.'\', \''.$e->prenomEt.'\', \''.$e->email.'\', \''.$e->cv.'\', \''.$e->codeDip.'\')" id="modifier'.$e->numEtudiant.'">Modifier</button><button id="supprimer'.$e->numEtudiant.'" class="btn col s12 m6" onclick="vraiment('.$e->numEtudiant.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$e->numEtudiant.'"><input type="hidden" name="controleur" value="etudiants"><input type="hidden" name="action" value="delete"><input type="hidden" name="numEtudiant" value="'.$e->numEtudiant.'"></form></td>';
    echo '</tr>';
}
echo '</table>';
if ($nbe == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUN ÉTUDIANT ICI!</h3></td></tr>';
}


<style>
    table form input {
        text-align: center;
    }
</style>

<script>
    
            function getform(idligne, intituleDip, adresseWebD, niveau, nomU) {
                    <?php
    include_once 'utils.php';
    $conn = Utils::connecter();
        
    $sql = 'SELECT nomU FROM universites;';
    $result = Utils::querySQL($sql, $conn);
    echo "var options = '";   
    foreach ($result-> fetchAll() as $u) {
        echo '<option id="optionU'.substr($u['nomU'], -3, 3).'" value="'.$u['nomU'].'">'.$u['nomU'].'</option>';
    }
    echo "';";
    Utils::deconnecter($conn);
?>
                
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="diplomes"><input type="hidden" name="action" value="update"><input type="hidden" name="codeDip" value="'+idligne+'"><div class="row"><div class="col s12 m6">Intitulé du diplôme : <input type="text" name="intituleDip" placeholder="Intitulé du diplôme" value="'+intituleDip+'"></div><div class="col s12 m6">Adresse web : <input type="text" name="adresseWebD" placeholder="Adresse web" value="'+adresseWebD+'"></div><div class="col s12 m6">Niveau : <input type="text" name="niveau" placeholder="Niveau" value="'+niveau+'"></div><div class="col s12 m6">Nom de l\'université : <select name="nomU" class="browser-default black-text">'+options+'</select></div><input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                var optionselected = '#optionU' + nomU.substr(-3, 3);
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="6"><h3>Modification du diplôme n°'+idligne+'</h3>'+form+'</td></tr>');
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

echo '<h1>Listes des Diplômes</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'diplomes\', \'addform\')">+ Ajouter un diplôme</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Code du diplôme</th><th>Intitulé du diplôme</th><th>Adresse web</th><th>Niveau</th><th>Nom de l\'université</th><th>Actions</th></tr>';
$nbd = 0;
foreach ($diplomes as $d) {
    $nbd++;
    echo '<tr class="ligne" id="ligne'.$d->codeDip.'">';
    echo '<td class="search" id="search'.$d->codeDip.'">'.$d->codeDip.'</td>';
    echo '<td class="search" id="search'.$d->codeDip.'">'.$d->intituleDip.'</td>';
    echo '<td class="search" id="search'.$d->codeDip.'"><a href="'.$d->adresseWebD.'" target="blank">'.$d->adresseWebD.'</a></td>';
    echo '<td class="search" id="search'.$d->codeDip.'">'.$d->niveau.'</td>';
    echo '<td class="search" id="search'.$d->codeDip.'">'.$d->nomU.'</td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$d->codeDip.', \''.$d->intituleDip.'\', \''.$d->adresseWebD.'\', \''.$d->niveau.'\', \''.$d->nomU.'\')" id="modifier'.$d->codeDip.'">Modifier</button><button id="supprimer'.$d->codeDip.'" class="btn col s12 m6" onclick="vraiment('.$d->codeDip.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$d->codeDip.'"><input type="hidden" name="controleur" value="diplomes">
    <input type="hidden" name="action" value="delete"><input type="hidden" name="codeDip" value="'.$d->codeDip.'"></form>';
    echo '<form action="index.php" method="post"><input type="hidden" name="controleur" value="cours">
    <input type="hidden" name="action" value="findD"><input type="hidden" name="codeDip" value="'.$d->codeDip.'"><input type="hidden" name="intituleDip" value="'.$d->intituleDip.'"><input type="submit" name="voirdip" value="Voir les cours" class="btn col s12 m12"></form></td>';
    echo '</tr>';
}
echo '</table>';
if ($nbd == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUN DIPLÔME ICI!</h3></td></tr>';
}


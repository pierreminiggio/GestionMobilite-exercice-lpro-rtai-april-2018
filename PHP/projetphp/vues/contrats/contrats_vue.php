<style>
    table form input {
        text-align: center;
    }
</style>

<script>
    
            function getform(idligne, duree, etatContrat, ordre, codeDip, intituleP, refDemMob) {
                    <?php
    include_once 'utils.php';
    
    $conn2 = Utils::connecter();
        
    $sql2 = 'SELECT * FROM diplomes;';
    $result2 = Utils::querySQL($sql2, $conn2);
    echo "var optionsD = '";   
    foreach ($result2-> fetchAll() as $d) {
        echo '<option id="optionD'.$d['codeDip'].'" value="'.$d['codeDip'].'">'.$d['intituleDip'].'</option>';
    }
    echo "';";
    Utils::deconnecter($conn2);
    
    $conn3 = Utils::connecter();
        
    $sql3 = 'SELECT * FROM programmes;';
    $result3 = Utils::querySQL($sql3, $conn3);
    echo "var optionsP = '";   
    foreach ($result3-> fetchAll() as $p) {
        echo '<option id="optionP'.$p['intituleP'].'" value="'.$p['intituleP'].'">'.$p['intituleP'].'</option>';
    }
    echo "';";
    Utils::deconnecter($conn3);
    
    $conn4 = Utils::connecter();
        
    $sql4 = 'SELECT * FROM demandemobilites;';
    $result4 = Utils::querySQL($sql4, $conn4);
    echo "var optionsM = '";   
    foreach ($result4-> fetchAll() as $m) {
        echo '<option id="optionM'.$m['refDemMob'].'" value="'.$m['refDemMob'].'">'.$m['refDemMob'].'</option>';
    }
    echo "';";
    Utils::deconnecter($conn4);
?>
                
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="contrats"><input type="hidden" name="action" value="update">';
                form += '<input type="hidden" name="idContrat" value="'+idligne+'"><div class="row">';
                form += '<div class="col s12 m6">Durée du contrat : <input type="number" name="duree" placeholder="Durée du contrat" value="'+duree+'"></div>';
                form += '<div class="col s12 m6">Etat du contrat : <input type="text" name="etatContrat" placeholder="Etat du contrat" value="'+etatContrat+'"></div>';
                form += '<div class="col s12 m6">Ordre : <input type="text" name="ordre" placeholder="Ordre" value="'+ordre+'"></div>';
                form += '<div class="col s12 m6">Diplôme : <select name="codeDip" class="browser-default black-text">'+optionsD+'</select></div>';
                form += '<div class="col s12 m6">Programme : <select name="intituleP" class="browser-default black-text">'+optionsP+'</select></div>';
                form += '<div class="col s12 m6">Demande de mobilité : <select name="refDemMob" class="browser-default black-text">'+optionsM+'</select></div>';
                
                form += '<input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                
                var optionselectedD = '#optionD' + codeDip;
                var optionselectedP = '#optionP' + intituleP;
                var optionselectedM = '#optionM' + refDemMob;
                
                
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="8"><h3>Modification du contrat n°'+idligne+'</h3>'+form+'</td></tr>');
                    $(optionselectedD).attr('selected','selected');
                    $(optionselectedP).attr('selected','selected');
                    $(optionselectedM).attr('selected','selected');
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

echo '<h1>Listes des Contrats</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'contrats\', \'addform\')">+ Ajouter un contrat</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Référence du contrat</th><th>Durée</th><th>Etat</th><th>ordre</th><th>Diplôme</th><th>Programme</th><th>Demande mobilité</th><th>Actions</th></tr>';
$nbc = 0;
foreach ($contrats as $c) {
    $nbc++;
    echo '<tr class="ligne" id="ligne'.$c->idContrat.'">';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->idContrat.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->duree.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->etatContrat.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->ordre.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->intituleDip.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->intituleP.'</td>';
    echo '<td class="search" id="search'.$c->idContrat.'">'.$c->refDemMob.'</td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$c->idContrat.', '.$c->duree.', \''.$c->etatContrat.'\', \''.$c->ordre.'\', '.$c->codeDip.', \''.$c->intituleP.'\', \''.$c->refDemMob.'\')" id="modifier'.$c->idContrat.'">Modifier</button><button id="supprimer'.$c->idContrat.'" class="btn col s12 m6" onclick="vraiment('.$c->idContrat.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$c->idContrat.'"><input type="hidden" name="controleur" value="contrats">
    <input type="hidden" name="action" value="delete"><input type="hidden" name="idContrat" value="'.$c->idContrat.'"></form>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
if ($nbc == 0){
    echo '<tr><td colspan="8"><h3 class="error">AUCUN CONTRAT ICI!</h3></td></tr>';
}


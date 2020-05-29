<style>
    table form input {
        text-align: center;
    }
</style>

<script>
    
            function getform(idligne, libelleCours, nbEcts) {
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="cours"><input type="hidden" name="action" value="update"><input type="hidden" name="codeCours" value="'+idligne+'"><div class="row"><div class="col s12 m6">Libellé du cours : <input type="text" name="libelleCours" placeholder="Libellé du cours" value="'+libelleCours+'"></div><div class="col s12 m6">Crédits ECTS : <input type="number" name="nbEcts" placeholder="Crédits ECTS" value="'+nbEcts+'"></div><input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="6"><h3>Modification du cours n°'+idligne+'</h3>'+form+'</td></tr>');
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

echo '<h1>Listes des Cours</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'cours\', \'addform\')">+ Ajouter un cours</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Code du cours</th><th>Libellé du cours</th><th>Crédits ECTS</th><th>Actions</th></tr>';
$nbc = 0;
foreach ($cours as $c) {
    $nbc++;
    echo '<tr class="ligne" id="ligne'.$c->codeCours.'">';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->codeCours.'</td>';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->libelleCours.'</td>';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->nbEcts.'</td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$c->codeCours.', \''.$c->libelleCours.'\', '.$c->nbEcts.')" id="modifier'.$c->codeCours.'">Modifier</button><button id="supprimer'.$c->codeCours.'" class="btn col s12 m6" onclick="vraiment('.$c->codeCours.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$c->codeCours.'"><input type="hidden" name="controleur" value="cours">
    <input type="hidden" name="action" value="delete"><input type="hidden" name="codeCours" value="'.$c->codeCours.'"></form>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
if ($nbc == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUN COURS ICI!</h3></td></tr>';
}


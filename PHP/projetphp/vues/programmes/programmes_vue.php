<style>
    table form input {
        text-align: center;
    }
</style>

<script>
    
            function getform(idligne, intituleP, explication) {
                
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="programmes">';
                form += '<input type="hidden" name="action" value="update">';
                form += '<input type="hidden" name="intituleP" value="'+intituleP+'">';
                form += '<div class="row">';
                form += '<div class="col s12 m12">Explication du programme : <input type="text" name="explication" placeholder="Explication du programme" value="'+explication+'"></div>';
                form += '<input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="6"><h3>Modification du programme '+intituleP+'</h3>'+form+'</td></tr>');
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

echo '<h1>Listes des programmes</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'programmes\', \'addform\')">+ Ajouter un programme</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Intitulé du programme</th><th>Explication du programme</th><th>Actions</th></tr>';
$nbp = 0;
foreach ($programmes as $p) {
    $nbp++;
    echo '<tr class="ligne" id="ligne'.$nbp.'">';
    echo '<td class="search" id="search'.$nbp.'">'.$p->intituleP.'</td>';
    echo '<td class="search" id="search'.$nbp.'">'.$p->explication.'</td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$nbp.', \''.$p->intituleP.'\', \''.$p->explication.'\')" id="modifier'.$nbp.'">Modifier</button><button id="supprimer'.$nbp.'" class="btn col s12 m6" onclick="vraiment('.$nbp.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$nbp.'"><input type="hidden" name="controleur" value="programmes">
    <input type="hidden" name="action" value="delete"><input type="hidden" name="intituleP" value="'.$p->intituleP.'"></form>';
    echo '</td></tr>';
}
echo '</table>';
if ($nbp == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUN PROGRAMME ICI!</h3></td></tr>';
}


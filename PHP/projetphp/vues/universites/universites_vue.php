<style>
    table form input {
        text-align: center;
    }
</style>

<script>
    
            function getform(idligne, nomU, adressePostaleU, adresseWebU, adresseElectU) {
                
                var form = '<form action="index.php" method="post"><input type="hidden" name="controleur" value="universites">';
                form += '<input type="hidden" name="action" value="update"><input type="hidden" name="nomU" value="'+nomU+'">';
                form += '<div class="row"><div class="col s12 m6">Adresse postale : <input type="text" name="adressePostaleU" placeholder="Adresse postale" value="'+adressePostaleU+'"></div>';
                form += '<div class="col s12 m6">Adresse web : <input type="text" name="adresseWebU" placeholder="Adresse web" value="'+adresseWebU+'"></div>';
                form += '<div class="col s12 m6">Mail : <input type="text" name="adresseElectU" placeholder="Mail" value="'+adresseElectU+'"></div>';
                form += '<input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Modifier"></div>';
                var idafter = '#ligne' + idligne;
                var idbtn = '#modifier' + idligne;
                var formid = '#formulaire' + idligne;
                
                if ($(idbtn).html() == 'Modifier') {

                    $(idafter).after('<tr id="formulaire'+idligne+'"><td colspan="6"><h3>Modification de l\'université '+nomU+'</h3>'+form+'</td></tr>');
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

echo '<h1>Listes des Universités</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button><button class="btn blue darken-2 col s8 offset-s2 m3 offset-m1" onclick="submit(\'universites\', \'addform\')">+ Ajouter une université</button></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Nom de l\'université</th><th>Adresse postale</th><th>Adresse web</th><th>Mail</th><th>Actions</th></tr>';
$nbu = 0;
foreach ($universites as $u) {
    $nbu++;
    echo '<tr class="ligne" id="ligne'.$nbu.'">';
    echo '<td class="search" id="search'.$nbu.'">'.$u->nomU.'</td>';
    echo '<td class="search" id="search'.$nbu.'">'.$u->adressePostaleU.'</td>';
    echo '<td class="search" id="search'.$nbu.'"><a href="'.$u->adresseWebU.'" target="blank">'.$u->adresseWebU.'</a></td>';
    echo '<td class="search" id="search'.$nbu.'"><a href="mailto:'.$u->adresseElectU.'">'.$u->adresseElectU.'</a></td>';
    echo '<td class="row"><button class="btn blue darken-2 col s12 m6" onclick="getform('.$nbu.', \''.$u->nomU.'\', \''.$u->adressePostaleU.'\', \''.$u->adresseWebU.'\', \''.$u->adresseElectU.'\')" id="modifier'.$nbu.'">Modifier</button><button id="supprimer'.$nbu.'" class="btn col s12 m6" onclick="vraiment('.$nbu.')">Supprimer</button><form action="index.php" method="post" id="formdel'.$nbu.'"><input type="hidden" name="controleur" value="universites">
    <input type="hidden" name="action" value="delete"><input type="hidden" name="nomU" value="'.$u->nomU.'"></form>';
    echo '<form action="index.php" method="post"><input type="hidden" name="controleur" value="diplomes">
    <input type="hidden" name="action" value="findU"><input type="hidden" name="nomU" value="'.$u->nomU.'"><input type="submit" name="voirdip" value="Voir les diplômes" class="btn col s12 m6"></form>';
    echo '<form action="index.php" method="post"><input type="hidden" name="controleur" value="contrats">
    <input type="hidden" name="action" value="findU"><input type="hidden" name="nomU" value="'.$u->nomU.'"><input type="submit" name="voircont" value="Voir les contrats" class="btn col s12 m6"></form>';
    echo '</td></tr>';
}
echo '</table>';
if ($nbu == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUNE UNIVERSITE ICI!</h3></td></tr>';
}


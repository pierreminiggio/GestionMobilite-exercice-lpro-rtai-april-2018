<style>
    table form input {
        text-align: center;
    }
</style>

<script>
            
            function vraiment(code) {
                var idbtnsup = '#supprimer' + code;
                var formdelid = '#formdel' + code;
                if ($(idbtnsup).html() == 'Déprogrammer') {
                    $(idbtnsup).html('Vraiment déprogrammer?');
                    $(idbtnsup).addClass('red');
                }
                else {
                    $(formdelid).submit();
                }
            }
</script>

<?php

echo '<h1>Listes des Cours</h1>';
echo '<div class="row"><input type="text" id="searchbox" placeholder="Rechercher" class="col s5 offset-s1 m3 offset-m1"><button class="btn col s4 offset-s1 m3" onclick="searchtext()">Rechercher</button>';

echo '<form action="index.php" method="post"><input type="hidden" name="controleur" value="cours"><input type="hidden" name="action" value="progform">';
echo '<input type="hidden" name="codeDip" value="'.$_POST['codeDip'].'"><input type="hidden" name="intituleDip" value="'.$_POST['intituleDip'].'">';
echo '<input type="submit" name="programmer" value="+ Programmer un cours" class="btn blue darken-2 col s8 offset-s2 m3 offset-m1"></form></div>';
echo '<table class="bordered centered">';
echo '<tr><th>Code du cours</th><th>Libellé du cours</th><th>Crédits ECTS</th><th>Actions</th></tr>';
$nbc = 0;
foreach ($cours as $c) {
    $nbc++;
    echo '<tr class="ligne" id="ligne'.$c->codeCours.'">';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->codeCours.'</td>';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->libelleCours.'</td>';
    echo '<td class="search" id="search'.$c->codeCours.'">'.$c->nbEcts.'</td>';
    echo '<td class="row"><button id="supprimer'.$c->codeCours.'" class="btn col s12" onclick="vraiment('.$c->codeCours.')">Déprogrammer</button><form action="index.php" method="post" id="formdel'.$c->codeCours.'"><input type="hidden" name="controleur" value="cours">
    <input type="hidden" name="action" value="deprog"><input type="hidden" name="codeCours" value="'.$c->codeCours.'"><input type="hidden" name="codeDip" value="'.$_POST['codeDip'].'"><input type="hidden" name="intituleDip" value="'.$_POST['intituleDip'].'"></form>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
if ($nbc == 0){
    echo '<tr><td colspan="6"><h3 class="error">AUCUN COURS ICI!</h3></td></tr>';
}


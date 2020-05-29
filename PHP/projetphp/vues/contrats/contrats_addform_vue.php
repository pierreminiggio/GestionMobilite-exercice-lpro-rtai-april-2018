<h1>Ajouter un contrat</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="contrats">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Durée du contrat : <input type="number" name="duree" placeholder="Durée du contrat">
        </div>
        <div class="col s12 m6">
            Etat du contrat : <input type="text" name="etatContrat" placeholder="Etat du contrat">
        </div>
        <div class="col s12 m6">
            Ordre : <input type="text" name="ordre" placeholder="Ordre">
        </div>
        <div class="col s12 m6">
            Diplôme : <select name="codeDip" class="browser-default black-text">
                 <?php
    include_once 'utils.php';
    
    $conn2 = Utils::connecter();
        
    $sql2 = 'SELECT * FROM diplomes;';
    $result2 = Utils::querySQL($sql2, $conn2);  
    foreach ($result2-> fetchAll() as $d) {
        echo '<option id="optionD'.$d['codeDip'].'" value="'.$d['codeDip'].'">'.$d['intituleDip'].'</option>';
    }
    Utils::deconnecter($conn2);
    
   
    
    
?>
            </select>
        </div>
        <div class="col s12 m6">
            Programme : <select name="intituleP" class="browser-default black-text">
                <?php
                 include_once 'utils.php';
    $conn3 = Utils::connecter();
        
    $sql3 = 'SELECT * FROM programmes;';
    $result3 = Utils::querySQL($sql3, $conn3);
    foreach ($result3-> fetchAll() as $p) {
        echo '<option id="optionP'.$p['intituleP'].'" value="'.$p['intituleP'].'">'.$p['intituleP'].'</option>';
    }
    Utils::deconnecter($conn3);
    ?>
            </select>
        </div>
        <div class="col s12 m6">
            Demande de mobilité : <select name="refDemMob" class="browser-default black-text">
                <?php
                include_once 'utils.php';
    $conn4 = Utils::connecter();
        
    $sql4 = 'SELECT * FROM demandemobilites;';
    $result4 = Utils::querySQL($sql4, $conn4);   
    foreach ($result4-> fetchAll() as $m) {
        echo '<option id="optionM'.$m['refDemMob'].'" value="'.$m['refDemMob'].'">'.$m['refDemMob'].'</option>';
    }
    Utils::deconnecter($conn4);
                ?>
            </select>
        </div>
        
        
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

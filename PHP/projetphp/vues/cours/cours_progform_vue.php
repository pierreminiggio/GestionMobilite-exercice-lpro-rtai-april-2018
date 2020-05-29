<h1>Programmer un cours</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="cours">
    <input type="hidden" name="action" value="prog">
    
    <div class="row">
        <div class="col s12 m6">
            Diplome : <select name="codeDip" class="browser-default black-text">
            <?php
            include_once 'utils.php';
            $conn = Utils::connecter();
        
            $sql = 'SELECT * FROM diplomes;';
            $result = Utils::querySQL($sql, $conn);
        
            foreach ($result-> fetchAll() as $d) {
                echo '<option value="'.$d['codeDip'].'">'.$d['intituleDip'].'</option>';
            }
            Utils::deconnecter($conn);
            ?>
            </select>
        </div>
        <div class="col s12 m6">
            Cours à ajouter : <select name="codeCours" class="browser-default black-text">
            <?php
            include_once 'utils.php';
            $conn2 = Utils::connecter();
        
            $sql2 = 'SELECT * FROM cours;';
            $result2 = Utils::querySQL($sql2, $conn2);
        
            foreach ($result2-> fetchAll() as $c) {
                echo '<option value="'.$c['CodeCours'].'">'.$c['libelleCours'].'</option>';
            }
            Utils::deconnecter($conn2);
            ?>
            </select>
        </div>
        <input type="hidden" name="intituleDip" value="<?=$_POST['intituleDip'];?>">
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Programmer">
    </div>
</form>


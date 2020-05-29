<h1>Ajouter un diplôme</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="diplomes">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Intitulé du diplôme : <input type="text" name="intituleDip" placeholder="Intitulé du diplôme">
        </div>
        <div class="col s12 m6">
            Adresse web : <input type="text" name="adresseWebD" placeholder="Adresse web">
        </div>
        <div class="col s12 m6">
            Niveau : <input type="text" name="niveau" placeholder="Niveau">
        </div>
        <div class="col s12 m6">
            Nom de l'université : <select name="nomU" class="browser-default black-text">
            <?php
            include_once 'utils.php';
            $conn = Utils::connecter();
        
            $sql = 'SELECT nomU FROM universites;';
            $result = Utils::querySQL($sql, $conn);
        
            foreach ($result-> fetchAll() as $u) {
                echo '<option value="'.$u['nomU'].'">'.$u['nomU'].'</option>';
            }
        Utils::deconnecter($conn);
        ?>
            </select>
        </div>
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

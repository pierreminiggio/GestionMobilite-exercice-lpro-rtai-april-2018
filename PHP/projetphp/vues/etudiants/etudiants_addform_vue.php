<h1>Ajouter un étudiant</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="etudiants">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Nom de l'étudiant : <input type="text" name="nomEt" placeholder="Nom de l'étudiant">
        </div>
        <div class="col s12 m6">
            Prénom de l'étudiant : <input type="text" name="prenomEt" placeholder="Prénom de l'étudiant">
        </div>
        <div class="col s12 m6">
            Email : <input type="text" name="email" placeholder="Email">
        </div>
        <div class="col s12 m6">
            CV : <input type="text" name="cv" placeholder="CV">
        </div>
        <div class="col s12 m6 offset-m3">
            Diplôme : <select name="codeDip" class="browser-default black-text">
            <?php
            include_once 'utils.php';
            $conn = Utils::connecter();
        
            $sql = 'SELECT codeDip, intituleDip FROM diplomes;';
            $result = Utils::querySQL($sql, $conn);
        
            foreach ($result-> fetchAll() as $d) {
                echo '<option value="'.$d['codeDip'].'">'.$d['intituleDip'].'</option>';
            }
        Utils::deconnecter($conn);
        ?>
            </select>
        </div>
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

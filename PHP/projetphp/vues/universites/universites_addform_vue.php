<h1>Ajouter une université</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="universites">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Nom de l'université : <input type="text" name="nomU" placeholder="Nom de l'université">
        </div>
        <div class="col s12 m6">
            Adresse postale : <input type="text" name="adressePostaleU" placeholder="Adresse postale">
        </div>
        <div class="col s12 m6">
            Adresse web : <input type="text" name="adresseWebU" placeholder="Adresse web">
        </div>
        <div class="col s12 m6">
            Mail : <input type="text" name="adresseElectU" placeholder="Mail">
        </div>
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

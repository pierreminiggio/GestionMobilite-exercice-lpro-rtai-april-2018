<h1>Ajouter un cours</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="cours">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Libellé du cours : <input type="text" name="libelleCours" placeholder="Libellé du cours">
        </div>
        <div class="col s12 m6">
            Crédits ECTS : <input type="number" name="nbEcts" placeholder="Crédits ECTS">
        </div>
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

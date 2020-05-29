<h1>Ajouter un programme</h1>
<form action="index.php" method="post">
    <input type="hidden" name="controleur" value="programmes">
    <input type="hidden" name="action" value="add">
    
    <div class="row">
        <div class="col s12 m6">
            Intitulé du programme : <input type="text" name="intituleP" placeholder="Intitulé du programme">
        </div>
        <div class="col s12 m6">
            Explication du programme : <input type="text" name="explication" placeholder="Explication du programme">
        </div>
        <input type="submit" class="btn col offset-s2 s8 offset-m3 m6" value="Ajouter">
    </div>
</form>

<script>
    function submit(controleur, action) {
        $('#controleur').val(controleur);
        $('#action').val(action);
        $('#formulairenav').submit();
    }
</script>

<nav>
    <div class="nav-wrapper blue">
        <a href="#" onclick="submit('demarrage', 'accueil')" class="brand-logo left"><img src="assets/img/logo.png" height="" style="margin-left: 5px;" alt="- ">Gestion Mobilité</a>
      <ul id="nav-mobile" class="right">
          <li><a href="#" onclick="submit('diplomes', 'show')">Les diplômes</a></li>
          <li><a href="#" onclick="submit('programmes', 'show')">Les programmes</a></li>
          <li><a href="#" onclick="submit('cours', 'show')">Les cours</a></li>
          <li><a href="#" onclick="submit('etudiants', 'show')">Les étudiants</a></li>
          <li><a href="#" onclick="submit('universites', 'show')">Les universités</a></li>
          <li><a href="#" onclick="submit('contrats', 'show')">Les contrats</a></li>
      </ul>
    </div>
</nav>
<form action="index.php" method="post" id="formulairenav">
    <input type="hidden" name="controleur" id="controleur" value="">
    <input type="hidden" name="action" id="action" value="">
</form>

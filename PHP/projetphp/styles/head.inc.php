<head>
         <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
   <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <meta charset="UTF-8">

      <style>
          th, h1, h2, h3, h4 {
              text-align: center;
          }
          
          .error {
              color: red;
          }
          
          th {
              background-color: #DDD;
              border: 1px #EEE solid;
          }
          
          td {
              background-color: #EEE;
              border: 1px #DDD solid;
          }
      </style>
      <script>
      function searchtext() {
        var recherche = $('#searchbox').val();
        recherche = recherche.toLowerCase();
        if (recherche !== "") {
            $('.ligne').each(function(index) {
                $(this).fadeOut(200);
            });
            jedoischeck = $('.search').each(function(index) {
                var contenu = $(this).text();
                contenu = contenu.toLowerCase();
                if(contenu.indexOf(recherche) > -1) {
                    ligne = "#ligne" + $(this).attr('id').substring(6);
                    $(ligne).fadeIn(500);
                    
                };
                
            });
        }
        else {
            $('.ligne').each(function(index) {
                $(this).fadeIn(500);
            });
        }
    }
      </script>
      
</head>


<%@include file="../index.jsp" %>

    <div id="formulaire">
        <form action="LeControleur" method="post">
            <%
                Vector fi  = (Vector)session.getAttribute("fi");
                if (fi != null && fi.size() != 0){
                    out.print("<br><h2><u><i>Les finances : </h2></u></i><br> <select name=\"finances\" class=\"form-control\"  style=\"width:35%;\">");
                    for (int i=0; i<fi.size(); i++){
                        Finance uneFi = (Finance) fi.get(i);
                            String s = uneFi.getReference() + " | " + uneFi.getDate() + " | " + uneFi.getEtat() + " | " + uneFi.getMontant() + "&euro; | " + uneFi.getIdC();
                            out.print("<option value=\""+uneFi.getReference()+"\">"+s+"</option>");
                    }
                    out.print("</select>");
                    out.print("<br><input type=\"hidden\" name=\"action\" value=\"modifF\">");
                    out.print("<button class=\"btn btn-outline-dark\" type=\"submit\" name=\"submit\" id=\"bouton\">Modifiez</button>");
                }else{
                    out.print("<br><div class=\"alert alert-danger\" role=\"alert\" style=\"margin-left: 20%; margin-right: 20%; text-align: center\">Il n'y a aucun élément ici :( </div>");
                }
            %>
            
        </form>
            <br><br><button class="btn btn-outline-warning" onclick="supp('f')" id="supprime">Supprimer</button> 
            <a href="index.jsp"><button class="btn btn-outline-dark">Revenez !</button></a><br><br>
    </div>    
    </body>
</html>
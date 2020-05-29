<%@include file="../index.jsp" %>

        <form action="LeControleur" method="post">
            <%
                
                Mobilite mob = (Mobilite)session.getAttribute("uneMob");
                if (mob != null){
                    out.print("<br><h2><u><i>Les mobilités : </h2></u></i><br><select name=\"Mobilites\" class=\"form-control\" style=\"width:35%;\">");

                            String s = mob.getReference() + " | " + mob.getDate() + " | " + mob.getEtat() + " | " + mob.getNumE() + " | " + mob.getCodeD() + " | ";
                            out.print("<option value=\""+mob.getReference()+"\">"+s+"</option>");
                        
                    
                    out.print("</select>");
                    out.print("<br><input type=\"hidden\" name=\"action\" value=\"supp\">");
                    out.print("<button class=\"btn btn-outline-dark\" type=\"submit\" name=\"submit\" id=\"bouton\">Modifiez</button>");
                }
            %>
            
        </form>
            <br><br><button class="btn btn-outline-warning" onclick="supp()" id="supprime">Supprimer</button> 
            <a href="index.jsp"><button class="btn btn-outline-dark">Revenez !</button></a><br><br>
    </div>
    </body>
</html>

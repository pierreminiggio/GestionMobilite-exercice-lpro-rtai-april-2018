<%@include file="../index.jsp" %>

        <form action="LeControleur" method="post" >
            <%
                Vector lesM = (Vector)session.getAttribute("lesM");
                if (lesM != null && lesM.size() != 0){
                    
                    out.print("<br><h2><u><i>Les mobilités : </h2></u></i><br><select name=\"Mobilites\" class=\"form-control\" style=\"width:35%;\">");
                    for (int i=0; i<lesM.size(); i++){
                        Mobilite uneMob = (Mobilite) lesM.get(i);
                            
                            String s = uneMob.getReference() + "  |  " + uneMob.getDate() + "  |  " + uneMob.getEtat() + "  |  " + uneMob.getNumE() + "  |  " + uneMob.getCodeD();
                            out.print("<option value=\""+uneMob.getReference()+"\">"+s+"</option>");
                        
                    }
                    out.print("</select>");
                    out.print("<br><input type=\"hidden\" name=\"action\" value=\"modif\" id=\"modif\">");
                    out.print("<button class=\"btn btn-outline-dark\" type=\"submit\" name=\"submit\" id=\"bouton\">Modifiez</button>");
                }
            %>
        </form>
            <br><br><button class="btn btn-outline-warning" onclick="supp('m')" id="supprime">Supprimer</button> 
            <a href="index.jsp"><button class="btn btn-outline-dark">Revenez !</button></a><br><br>
        </div>
               
    </body>
</html>

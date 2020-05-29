<%@include file="../index.jsp" %>

        <form action="LeControleur" method="post">
            <%
                Vector lesP = (Vector)session.getAttribute("lesP");
                if (lesP != null && lesP.size() != 0){
                    out.print("<br><h2><u><i>Les programmes : </h2></u></i><br> <select name=\"programmes\" class=\"form-control\" style=\"width:35%;\">");
                    
                    for (int i=0; i<lesP.size(); i++){
                        Programme unP = (Programme) lesP.get(i);
                            String s = unP.getIntitule() + " | " + unP.getExplitation();
                            out.print("<option value=\""+unP.getIntitule()+"\">"+s+"</option>");       
                    }
                    out.print("</select>");
                    out.print("<br><input type=\"hidden\" name=\"action\" value=\"getContrats\">");
                    out.print("<button class=\"btn btn-outline-dark\" type=\"submit\" name=\"submit\" >Voir les contrats associés</button>");
                }
            %>
            
        </form>
            <br><br><a href="index.jsp"><button class="btn btn-outline-dark">Revenez !</button></a><br><br>
    </div>
    </body>
</html>

<%@include file="../index.jsp" %>

        <form action="LeControleur" method="post">
            <%
                Vector lesC = (Vector)session.getAttribute("lesC");
                if (lesC != null && lesC.size() != 0){
                    Contrat unCt = (Contrat) lesC.get(0);
                    out.print("<br><h2><u><i>Les contrats du programme "+unCt.getIntituleP()+" : </h2></u></i><br> <select name=\"programmes\" class=\"form-control\" style=\"width:35%;\">");
                    
                    for (int i=0; i<lesC.size(); i++){
                        Contrat unC = (Contrat) lesC.get(i);
                            String s = unC.getIdContrat() + " | " + unC.getDate() + " | " + unC.getEtat() + " | " + unC.getOrdre() + " | " + unC.getCodeD() + " | " + unC.getIntituleP() + " | " + unC.getRef();
                            out.print("<option value=\""+unC.getIdContrat()+"\">"+s+"</option>");       
                    }
                    out.print("</select>");
                }
            %>
            
        </form>
            <br><br><a href="index.jsp"><button class="btn btn-outline-dark">Revenez !</button></a><br><br>
    </div>
    </body>
</html>
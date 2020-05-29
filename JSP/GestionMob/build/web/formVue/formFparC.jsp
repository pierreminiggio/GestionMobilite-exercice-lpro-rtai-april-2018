<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Recherchez une demande de financement par contrat : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
        <br>

          <%
            Vector<Contrat> lesC = (Vector)Contrat.getContrats();

            out.print("<br><h5><u><i>Contrats : </u></h5></i>");

            out.print("<select name=\"idC\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
            for(int i=0;i<lesC.size();i++){
                  Contrat unC = (Contrat) lesC.get(i);
                  out.print("<option value=\""+unC.getIdContrat()+"\">"+unC.getIdContrat()+"</option>");
            }
            out.print("</select>");
          %>
          
          <input type="hidden" name="action" value="voirFParC" />
          <button type="submit" class="b btn btn-outline-dark">Submit</button><br><br>
        </div>
        
        
      </form>
        
        </div>
    </body>
</html>
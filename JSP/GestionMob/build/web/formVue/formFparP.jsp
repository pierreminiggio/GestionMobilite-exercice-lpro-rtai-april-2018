<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Recherchez une demande de financement par programme : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
        <br>

        <form action="LeControleur" method="post">
        <div class="form-group">
            <!-- faire une liste déroulante -->
            
          <%
            Vector<Programme> lesP = (Vector)Programme.getProgrammes();

            out.print("<br><h5><u><i>Programmes : </u></h5></i>");

            out.print("<select name=\"intitule\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
            for(int i=0;i<lesP.size();i++){
                  Programme unP = (Programme) lesP.get(i);
                  out.print("<option value=\""+unP.getIntitule()+"\">"+unP.getIntitule()+"</option>");
            }
            out.print("</select>");
          %>
          <input type="hidden" name="action" value="voirFParP" />
          <button type="submit" class="b btn btn-outline-dark">Submit</button><br><br>
        </div>
        
        
      </form>
 
        </div>
    </body>
</html>
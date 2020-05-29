<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Recherchez une demande de mobilité par contrat : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
            <!-- faire une liste déroulante -->
            <%
            Vector<Diplome> lesD = (Vector)Diplome.getDiplomes();
          out.print("<br><h5><u><i>Contrats : </u></h5></i>");
          out.print("<select name=\"nomD\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
          for(int i=0;i<lesD.size();i++){
                Diplome unD = (Diplome) lesD.get(i);
                out.print("<option value=\""+unD.getIntitule()+"\">"+unD.getIntitule()+"</option>");
          }
          out.print("</select>");
          %>
          <input type="hidden" name="action" value="voirParD" />
          <button type="submit" class="b btn btn-outline-dark">Submit</button><br><br>
        </div>
        
        
      </form>
        
        
        </div>
        
    </body>
</html>
<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Recherchez une demande de mobilité par etudiant : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
        <br>

          <%
            Vector<Etudiant> lesE = (Vector)Etudiant.getEtudiants();
            out.print("<br><h5><u><i>Etudiants : </u></h5></i>");
            out.print("<select name=\"numE\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
            for(int i=0;i<lesE.size();i++){
                Etudiant unE = (Etudiant) lesE.get(i);
                out.print("<option value=\""+unE.getNum()+"\">"+unE.getPrenom()+" "+unE.getNom()+"</option>");
          }
          out.print("</select>");
            
          %>
          
          <input type="hidden" name="action" value="voirParE" />
          <button type="submit"  class="b btn btn-outline-dark">Submit</button><br><br>
        </div>
        
        
      </form>
        
        
        </div>
    </body>
</html>
<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Recherchez une demande de mobilité par etudiant : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
        <br>

            
          <%
           Vector<Universite> lesE = (Vector)Universite.getUni();
            out.print("<br><h5><u><i>Universites : </u></h5></i>");
            out.print("<select name=\"nomU\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
            for(int i=0;i<lesE.size();i++){
                Universite unE = (Universite) lesE.get(i);
                out.print("<option value=\""+unE.getNomU()+"\">"+unE.getNomU()+"</option>");
          }
          out.print("</select>");
          %>
          <input type="hidden" name="action" value="voirParU" />
          <button type="submit" class="b btn btn-outline-dark">Submit</button><br><br>
        </div>
        
      </form>
        </div>
    </body>
</html>
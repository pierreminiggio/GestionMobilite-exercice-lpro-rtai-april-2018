<%@include file="../index.jsp" %>
        <br>
        <br><h2><u><i>Ajoutez une demande de financement : </h2></u></i><br>
        <form action="LeControleur" method="post">
        <div class="form-group">
        <div class="row">
            
            <div class="col">
              <br><h5><u><i>Reference : </u></h5></i>
<input class="a form-control" type="text" name="ref" required>
            </div>    
            <div class="col">
                <br><h5><u><i>Date : </u></h5></i>
                <input class="a form-control" type="date" name="date" required>
            </div>    
        </div>
        <div class="row">
            <div class="col">
                <br><h5><u><i>Etat : </u></h5></i>
                <input class="a form-control" type="text" name="etat" required>
            </div>
            <div class="col">
                <br><h5><u><i>Montant accorde : </u></h5></i>
                <input class="a form-control" type="number" name="montant" required>
            </div>
        </div>
          
          
          
          <%
          Vector<Contrat> lesC = (Vector)Contrat.getContrats();

          out.print("<br><h5><u><i>Contrat : </u></h5></i>");
          
          out.print("<select name=\"idC\" class=\"a form-control\" style=\"width:35%;margin:auto;\">");
          for(int i=0;i<lesC.size();i++){
                Contrat unC = (Contrat) lesC.get(i);
                out.print("<option value=\""+unC.getIdContrat()+"\">"+unC.getIdContrat()+"</option>");
          }
          out.print("</select>");
          %>
          <input type="hidden" name="action" value="ajoutF" />
          <button class="b btn btn-outline-dark" type="submit" class="btn btn-primary">Submit</button><br><br>
        </div>
        
        
      </form>
        
        
        
        </div>
    </body>
</html>

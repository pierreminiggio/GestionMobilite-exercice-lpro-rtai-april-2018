<%@include file="../index.jsp" %>

        <br>
        <%
        out.print("<br><h2><u><i>Ajoutez une demande de mobilité : </h2></u></i><br>");
        out.print("<form action=\"LeControleur\" method=\"post\"");
        out.print("<div class=\"form-group\">");
        
        out.print("<div class=\"row\">");
        
            out.print("<div class=\"col\">");
            
                out.print("<br><h5><u><i>Reference : </u></h5></i>");
                out.print("<input class=\"a form-control\" type=\"text\" name=\"ref\" required>");
                
            out.print("</div>");  
            
            out.print("<div class=\"col\">");
        
                out.print("<br><h5><u><i>Date : </u></h5></i>");
                out.print("<input class=\"a form-control\" type=\"date\" name=\"date\" required>");
                
            out.print("</div>"); 
            
        out.print("</div>");     
        out.print("<div class=\"row\">");
         
            out.print("<div class=\"col\">");

                out.print("<br><h5><u><i>Etat : </u></h5></i>");
                out.print("<input class=\"a form-control\" type=\"text\" name=\"etat\" required>");
                
            out.print("</div>"); 
            
            out.print("<div class=\"col\">");
            
                out.print("<br><h5><u><i>Etudiant : </u></h5></i>");
                Vector<Etudiant> lesE = (Vector)Etudiant.getEtudiants();
                out.print("<select name=\"numE\" class=\"a form-control\" style=\"width:35%;margin:auto;\" >");
                for(int i=0;i<lesE.size();i++){
                      Etudiant unE = (Etudiant) lesE.get(i);
                      out.print("<option value=\""+unE.getNum()+"\">"+unE.getPrenom()+" "+unE.getNom()+"</option>");
                }
                out.print("</select>");
                
            out.print("</div>");
          
        out.print("</div>");
            
          Vector<Diplome> lesD = (Vector)Diplome.getDiplomes();
          out.print("<br><h5><u><i>Diplome : </u></h5></i>");
          out.print("<select name=\"codeC\"  class=\"a form-control\" style=\"width:50%;margin:auto;\">");
          for(int i=0;i<lesD.size();i++){
                Diplome unD = (Diplome) lesD.get(i);
                out.print("<option value=\""+unD.getCode()+"\">"+unD.getIntitule()+"</option>");
          }
          out.print("</select>");
          
          out.print("<input type=\"hidden\" name=\"action\" value=\"ajout\" />");
          out.print("<button class=\"b btn btn-outline-dark\" type=\"submit\">Submit</button><br><br>");
          
           
        out.print("</div>");
        
        
      out.print("</form>");
        %>
           
    </div>
    </body>
</html>

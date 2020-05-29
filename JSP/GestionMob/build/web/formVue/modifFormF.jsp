<%@include file="../index.jsp" %>
        <br>
        <% 
            
            
            String uneRef = (String)session.getAttribute("ref");
            
            Finance leF = Finance.getFinance(uneRef);
            out.print("<br><h2><u><i>Modifiez la demande de financement n° "+leF.getReference()+" : </h2></u></i><br>");

            out.print("<form action='LeControleur' method='post'>");
            out.print("<div class='form-group'>");
            
        
                    out.print("<input class=\"a form-control\" type='hidden' name='ref' value='"+leF.getReference()+"' ><form action='LeControleur' method='post'>");
                    
                
                
            out.print("<div class=\"row\">");
        
                out.print("<div class=\"col\">");
                
                    out.print("<br><h5><u><i>Date : </u></h5></i>");
                    out.print("<input class=\"a form-control\" type='date' name='date' value='"+leF.getDate()+"'>");
                    
                out.print("</div>");
                

            
                out.print("<div class=\"col\">");
                
                    out.print("<br><h5><u><i>Etat : </u></h5></i>");
                    out.print("<input class=\"a form-control\" type='text' name='etat' value='"+leF.getEtat()+"'>");
                    
                out.print("</div>");
            out.print("</div>");
            
            out.print("<div class=\"row\">");
                out.print("<div class=\"col\">");
                    
            Vector<Contrat> lesD = (Vector)Contrat.getContrats();
            out.print("<br><h5><u><i>Diplomes : </u></h5></i>");
            out.print("<select name=\"idC\" class=\"a form-control\" style=\"margin:auto;\">");
            for(int i=0;i<lesD.size();i++){
                  Contrat unC = (Contrat) lesD.get(i);
                  if(unC.getIdContrat() == leF.getIdC()){
                    out.print("<option value=\""+unC.getIdContrat()+"\" selected>"+unC.getIdContrat()+"</option>");
                  }else{
                     out.print("<option value=\""+unC.getIdContrat()+"\">"+unC.getIdContrat()+"</option>"); 
                  }
            }
            out.print("</select><br><br>");
                out.print("</div>");
                out.print("<div class=\"col\">");
                    out.print("<br><h5><u><i>Montant : </u></h5></i>");
                    out.print("<input class=\"a form-control\" type='number' name='montant' value='"+leF.getMontant()+"'><br>");
                
                
            out.print("<input type='hidden' name='action' value='modifieF' /><button class=\"btn btn-outline-dark\" type=\"submit\">Submit</button><br><br>");
            out.print("</div></form>");
            out.print("</div>");
        out.print("</div>");

        %>

        
        
        
    </body>
</html>

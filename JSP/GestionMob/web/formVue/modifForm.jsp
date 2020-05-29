<%@include file="../index.jsp" %>
        <br>
        <% 
            
            String uneRef = (String)session.getAttribute("ref");
            
            Mobilite laMob = Mobilite.getMobilite(uneRef);
            
            out.print("<br><h2><u><i>Modifiez la demande de mobilité n° "+laMob.getReference()+" : </h2></u></i><br>");
            
            out.print("<form action='LeControleur' method='post'>");
            out.print("<div class='form-group'>");
            out.print("<input type='hidden' name='ref' value='"+laMob.getReference()+"' ><form action='LeControleur' method='post'>");
            
            out.print("<div class=\"row\">");
        
                out.print("<div class=\"col\">"); 
                out.print("<br><h5><u><i>Date : </u></h5></i>");
                    out.print("<input class=\"a form-control\" type='date' name='date' value='"+laMob.getDate()+"'>");
                out.print("</div>");     
                
                out.print("<div class=\"col\">"); 
                    out.print("<br><h5><u><i>Etat : </u></h5></i>");
                    out.print("<input class=\"a form-control\" type='text' name='etat' value='"+laMob.getEtat()+"'>");
                out.print("</div>");
            out.print("</div>");
            out.print("<div class=\"row\">");
            
                out.print("<div class=\"col\">");
                    Vector<Etudiant> lesE = (Vector)Etudiant.getEtudiants();

                    out.print("<br><h5><u><i>Etudiant : </u></h5></i>");
                    out.print("<select name=\"numE\" class=\"a form-control\" style=\"margin:auto;\">");
                    for(int i=0;i<lesE.size();i++){
                          Etudiant unE = (Etudiant) lesE.get(i);
                          if(unE.getNum() == laMob.getNumE()){
                            out.print("<option value=\""+unE.getNum()+"\" selected>"+unE.getPrenom()+" "+unE.getNom()+"</option>");
                          }else{
                              out.print("<option value=\""+unE.getNum()+"\">"+unE.getPrenom()+" "+unE.getNom()+"</option>");
                          }
                    }
                    out.print("</select>");
                out.print("</div>"); 
                out.print("<div class=\"col\">");
                    Vector<Diplome> lesD = (Vector)Diplome.getDiplomes();
                    out.print("<br><h5><u><i>Diplôme : </u></h5></i>");
                    out.print("<select name=\"codeC\" class=\"a form-control\" style=\"margin:auto;\">");
                    for(int i=0;i<lesD.size();i++){
                          Diplome unD = (Diplome) lesD.get(i);
                          if(unD.getCode() == laMob.getCodeD()){
                            out.print("<option value=\""+unD.getCode()+"\" selected>"+unD.getIntitule()+"</option>");
                          }else{
                             out.print("<option value=\""+unD.getCode()+"\">"+unD.getIntitule()+"</option>"); 
                          }
                    }
                    out.print("</select>");
                out.print("</div>");
            out.print("</div>");

            out.print("<input type='hidden' name='action' value='modifie' /><button type='submit' class=\"b btn btn-outline-dark\">Submit</button><br><br>");
            out.print("</div></form>");

        %>

        
        
        
    </body>
</html>

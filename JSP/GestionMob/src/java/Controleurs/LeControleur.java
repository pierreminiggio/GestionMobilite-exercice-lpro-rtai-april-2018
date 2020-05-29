/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controleurs;

import Modeles.Mobilite;
import Modeles.Contrat;
import Modeles.Finance;
import Modeles.Programme;
import java.io.IOException;
import java.io.PrintWriter;
import static java.lang.Integer.min;
import java.util.Vector;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Ssanchez
 */
public class LeControleur extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //La session en cours
        HttpSession session = request.getSession();
       
       //Le dispatcher de requêtes
       RequestDispatcher rd = null;
       
       //Vérification session
       if (session == null){
           rd = request.getRequestDispatcher("/error.html");
           rd.forward(request, response);
       }
       else { //Tout va bien -> routage
           //String controler = request.getParameter("controler");   
           String action = request.getParameter("action");
           
           //Démarrage de l'application
           if (action.equalsIgnoreCase("start")){
               //Affichage du catalogue des Mobilite
               Vector<Mobilite> lesM = Mobilite.getMobilite();
               session.setAttribute("lesM", lesM);
               rd = request.getRequestDispatcher("/consultationVue/voirM.jsp");
               rd.forward(request, response);
           } else if(action.equalsIgnoreCase("startF")){    
               Vector<Finance> fi = Finance.getFinance();
               session.setAttribute("fi", fi);
               rd = request.getRequestDispatcher("/consultationVue/finances.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("checkout")){    
               rd = request.getRequestDispatcher("/formVue/checkout.jsp");
               rd.forward(request, response);
               
           }else if(action.equalsIgnoreCase("checkoutF")){    
               rd = request.getRequestDispatcher("/formVue/checkoutF.jsp");
               rd.forward(request, response);
               
           }
           
           
           else if(action.equalsIgnoreCase("ajout")){
               String laRef = request.getParameter("ref");
               String laDate = request.getParameter("date");
               String lEtat = request.getParameter("etat");
               int leNum = Integer.parseInt(request.getParameter("numE"));
               int leCode = Integer.parseInt(request.getParameter("codeC"));
               Mobilite.ajoutMobilite(laRef, laDate, lEtat, leNum, leCode);
               rd = request.getRequestDispatcher("/ajout.jsp");
               rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("ajoutF")){
               String laRef = request.getParameter("ref");
               String laDate = request.getParameter("date");
               String lEtat = request.getParameter("etat");
               int leMontant = Integer.parseInt(request.getParameter("montant"));
               int lid = Integer.parseInt(request.getParameter("idC"));
               Finance.ajoutFinance(laRef,laDate,lEtat,leMontant,lid);
               rd = request.getRequestDispatcher("/ajout.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("modif")){
                String laRef = request.getParameter("Mobilites");
                session.setAttribute("ref", laRef);
                rd = request.getRequestDispatcher("/formVue/modifForm.jsp");
                rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("modifie")){
                String laRef = request.getParameter("ref");
                String laDate = request.getParameter("date");
                String lEtat = request.getParameter("etat");
                int leNum = Integer.parseInt(request.getParameter("numE"));
                System.out.print("le num : "+leNum);
                int leCode = Integer.parseInt(request.getParameter("codeC"));
                
               
                
                
                Mobilite.modifMobilite(laRef,laDate,lEtat,leNum,leCode);
                rd = request.getRequestDispatcher("/modif.jsp");
                rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("modifF")){
                String laRef = request.getParameter("finances");
                session.setAttribute("ref", laRef);
                rd = request.getRequestDispatcher("/formVue/modifFormF.jsp");
                rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("modifieF")){
                String laRef = request.getParameter("ref");
                String laDate = request.getParameter("date");
                String lEtat = request.getParameter("etat");
                double montant = Double.parseDouble(request.getParameter("montant"));
                int leC = Integer.parseInt(request.getParameter("idC"));
                
                
                if(Finance.modifFinance(laRef, laDate, lEtat, montant, leC)){
                    rd = request.getRequestDispatcher("/modif.jsp");
                    rd.forward(request, response);
                }else{
                    rd = request.getRequestDispatcher("/error.html");
                    rd.forward(request, response);
                }
           }
           
           
           
           
           
           
           else if(action.equalsIgnoreCase("supp")){
               String laRef = request.getParameter("Mobilites");
               Mobilite.suppMobilite(laRef);
               rd = request.getRequestDispatcher("/supp.jsp");
               rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("suppF")){
               String laRef = request.getParameter("finances");
               Finance.suppFinance(laRef);
               rd = request.getRequestDispatcher("/supp.jsp");
               rd.forward(request, response);
           }
           
           
           else if(action.equalsIgnoreCase("voirE")){
               rd = request.getRequestDispatcher("/formVue/formE.jsp");
               rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("voirParE")){
               int numE = Integer.parseInt(request.getParameter("numE"));
               Mobilite uneMob = Mobilite.getMobiliteParE(numE);
               session.setAttribute("uneMob", uneMob);
               rd = request.getRequestDispatcher("/consultationVue/resE.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("voirU")){
               rd = request.getRequestDispatcher("/formVue/formU.jsp");
               rd.forward(request, response);
           }else if(action.equalsIgnoreCase("voirParU")){
               String nomU = request.getParameter("nomU");
               Vector<Mobilite> uneMob = Mobilite.getMobiliteParU(nomU);
               session.setAttribute("lesM", uneMob);
               
               rd = request.getRequestDispatcher("/consultationVue/voirM.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("voirD")){
               rd = request.getRequestDispatcher("/formVue/formD.jsp");
               rd.forward(request, response);
           }else if(action.equalsIgnoreCase("voirParD")){
               String intituleD = request.getParameter("nomD");
               Vector<Mobilite> uneMob = Mobilite.getMobiliteParD(intituleD);
               session.setAttribute("lesM", uneMob);
               
               rd = request.getRequestDispatcher("/consultationVue/voirM.jsp");
               rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("formFparC")){
              
               rd = request.getRequestDispatcher("/formVue/formFparC.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("voirFParC")){
               int idC = Integer.parseInt(request.getParameter("idC"));
               Vector<Finance> lesFi = Finance.getFinanceParContrat(idC);
               session.setAttribute("fi", lesFi);
               rd = request.getRequestDispatcher("/consultationVue/finances.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("formFparP")){
              
               rd = request.getRequestDispatcher("/formVue/formFparP.jsp");
               rd.forward(request, response);
           }
           
           else if(action.equalsIgnoreCase("voirFParP")){
               String intitule = request.getParameter("intitule");
               Vector<Finance> lesFi = Finance.getFinanceParProgramme(intitule);
               session.setAttribute("fi", lesFi);
               rd = request.getRequestDispatcher("/consultationVue/finances.jsp");
               rd.forward(request, response);
           }
           
           
           else if(action.equalsIgnoreCase("voirP")){
               Vector<Programme> lesP = Programme.getProgrammes();
               session.setAttribute("lesP", lesP);
               rd = request.getRequestDispatcher("/consultationVue/voirP.jsp");
               rd.forward(request, response);
           }
           else if(action.equalsIgnoreCase("getContrats")){
               String intitule = request.getParameter("programmes");
               Vector<Contrat> lesC = Programme.getContratParProgramme(intitule);
               session.setAttribute("lesC", lesC);
               rd = request.getRequestDispatcher("/consultationVue/voirC.jsp");
               rd.forward(request, response);
           }
           else{ //Par defaut
            rd = request.getRequestDispatcher("/error.html");
            rd.forward(request, response);
           }          
       }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}

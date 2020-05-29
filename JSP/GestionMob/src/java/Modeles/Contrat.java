/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modeles;

import Utiles.dbUtils;
import java.util.Vector;

/**
 *
 * @author Admin
 */
public class Contrat {
    
     /**
     * @return the idContrat
     */
    public int getIdContrat() {
        return idContrat;
    }

    /**
     * @param idContrat the idContrat to set
     */
    public void setIdContrat(int idContrat) {
        this.idContrat = idContrat;
    }

    /**
     * @return the date
     */
    public String getDate() {
        return date;
    }

    /**
     * @param date the date to set
     */
    public void setDate(String date) {
        this.date = date;
    }

    /**
     * @return the etat
     */
    public String getEtat() {
        return etat;
    }

    /**
     * @param etat the etat to set
     */
    public void setEtat(String etat) {
        this.etat = etat;
    }

    /**
     * @return the ordre
     */
    public String getOrdre() {
        return ordre;
    }

    /**
     * @param ordre the ordre to set
     */
    public void setOrdre(String ordre) {
        this.ordre = ordre;
    }

    /**
     * @return the codeD
     */
    public int getCodeD() {
        return codeD;
    }

    /**
     * @param codeD the codeD to set
     */
    public void setCodeD(int codeD) {
        this.codeD = codeD;
    }

    /**
     * @return the intituleP
     */
    public String getIntituleP() {
        return intituleP;
    }

    /**
     * @param intituleP the intituleP to set
     */
    public void setIntituleP(String intituleP) {
        this.intituleP = intituleP;
    }

    /**
     * @return the ref
     */
    public String getRef() {
        return ref;
    }

    /**
     * @param ref the ref to set
     */
    public void setRef(String ref) {
        this.ref = ref;
    }
    
    
    
    
    private int idContrat;
    private String date;
    private String etat;
    private String ordre;
    private int codeD;
    private String intituleP;
    private String ref;

    
    public static Vector<Contrat> getContrats(){
        Vector<Contrat> lesC = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM contrats";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Contrat unC = null;
        try{
            while (rs.next()){
                
                unC = new Contrat();
                unC.setIdContrat(Integer.parseInt(rs.getString("idContrat")));
                unC.setDate(rs.getString("duree"));
                unC.setEtat(rs.getString("etatContrat"));
                unC.setOrdre(rs.getString("ordre"));
                unC.setCodeD(Integer.parseInt(rs.getString("codeDip")));
                unC.setIntituleP(rs.getString("intituleP"));
                unC.setRef(rs.getString("refDemMob"));
            
                
                lesC.add(unC);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesC;
    }
    
    
   
}

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
public class Programme {
    
    /**
     * @return the intitule
     */
    public String getIntitule() {
        return intitule;
    }

    /**
     * @param intitule the intitule to set
     */
    public void setIntitule(String intitule) {
        this.intitule = intitule;
    }

    /**
     * @return the explitation
     */
    public String getExplitation() {
        return explitation;
    }

    /**
     * @param explitation the explitation to set
     */
    public void setExplitation(String explitation) {
        this.explitation = explitation;
    }
    
    
    private String intitule;
    private String explitation;

    public static Vector<Programme> getProgrammes(){
        Vector<Programme> lesProgs = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * ";
        sql += "FROM programmes ";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Programme unProg = null;
        try{
            while (rs.next()){
                unProg = new Programme();
                unProg.setIntitule(rs.getString("intituleP"));
                unProg.setExplitation(rs.getString("explication"));
            
                lesProgs.add(unProg);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesProgs;
    }
    public static Vector<Contrat> getContratParProgramme(String intitule){
        Vector<Contrat> lesC = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM contrats c, programmes p WHERE p.intituleP = c.intituleP AND c.intituleP = '"+intitule+"'";
        
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

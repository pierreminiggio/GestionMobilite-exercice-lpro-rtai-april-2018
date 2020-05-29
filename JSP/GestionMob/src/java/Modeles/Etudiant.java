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
 * @author bmeziere
 */
public class Etudiant {
     /**
     * @return the num
     */
    public int getNum() {
        return num;
    }

    /**
     * @param num the num to set
     */
    public void setNum(int num) {
        this.num = num;
    }

    /**
     * @return the nom
     */
    public String getNom() {
        return nom;
    }

    /**
     * @param nom the nom to set
     */
    public void setNom(String nom) {
        this.nom = nom;
    }

    /**
     * @return the prenom
     */
    public String getPrenom() {
        return prenom;
    }

    /**
     * @param prenom the prenom to set
     */
    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    /**
     * @return the email
     */
    public String getEmail() {
        return email;
    }

    /**
     * @param email the email to set
     */
    public void setEmail(String email) {
        this.email = email;
    }

    /**
     * @return the cv
     */
    public String getCv() {
        return cv;
    }

    /**
     * @param cv the cv to set
     */
    public void setCv(String cv) {
        this.cv = cv;
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
    
    
    
    
    private int num;
    private String nom;
    private String prenom;
    private String email;
    private String cv;
    private int codeD;
    
    
    public static Vector<Etudiant> getEtudiants(){
        Vector<Etudiant> lesE = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * ";
        sql += "FROM etudiants ";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Etudiant unE = null;
        try{
            while (rs.next()){
                unE = new Etudiant();
                unE.setNum(Integer.parseInt(rs.getString("numEtudiant")));
                unE.setNom(rs.getString("nomEt"));
                unE.setPrenom(rs.getString("prenomEt"));
                unE.setEmail(rs.getString("email"));
                unE.setCv(rs.getString("cv"));
                unE.setCodeD(Integer.parseInt(rs.getString("codeDip")));
            
                lesE.add(unE);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesE;
    }

   
}

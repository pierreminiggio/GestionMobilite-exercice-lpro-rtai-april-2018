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
 * @author Ssanchez
 */
public class Mobilite {
    private String reference;
    private String date;
    private String etat;
    private int numE;
    private int codeD;


    public static Vector<Mobilite> getMobilite(){
        Vector<Mobilite> lesMobs = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * ";
        sql += "FROM demandemobilites ";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Mobilite uneMob = null;
        try{
            while (rs.next()){
                uneMob = new Mobilite();
                uneMob.setReference(rs.getString("refDemMob"));
                uneMob.setDate(rs.getString("dateDepotDemMob"));
                uneMob.setEtat(rs.getString("etatDemMob"));
                uneMob.setNumE(Integer.parseInt(rs.getString("numEtudiant")));
                uneMob.setCodeD(Integer.parseInt(rs.getString("codeDip")));
            
                lesMobs.add(uneMob);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesMobs;
    }
    
    public static Mobilite getMobilite(String ref){
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandemobilites WHERE refDemMob = '" + ref + "'";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Mobilite uneMob = null;
        try{
            if (rs.first()){
                uneMob = new Mobilite();
                uneMob.setReference(rs.getString("refDemMob"));
                uneMob.setDate(rs.getString("dateDepotDemMob"));
                uneMob.setEtat(rs.getString("etatDemMob"));
                uneMob.setNumE(Integer.parseInt(rs.getString("numEtudiant")));
                uneMob.setCodeD(Integer.parseInt(rs.getString("codeDip")));
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return uneMob;
    }
    
    
    public static Mobilite getMobiliteParE(int num){
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        
        String sql = "SELECT * FROM demandemobilites d, etudiants e WHERE d.numEtudiant = e.numEtudiant AND e.numEtudiant = " + num;
        System.out.print(sql);
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Mobilite uneMob = null;
        try{
            if (rs.first()){
                uneMob = new Mobilite();
                uneMob.setReference(rs.getString("refDemMob"));
                uneMob.setDate(rs.getString("dateDepotDemMob"));
                uneMob.setEtat(rs.getString("etatDemMob"));
                uneMob.setNumE(Integer.parseInt(rs.getString("numEtudiant")));
                uneMob.setCodeD(Integer.parseInt(rs.getString("codeDip")));
                
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return uneMob;
    }
    public static  Vector<Mobilite> getMobiliteParU(String nom){
        java.sql.Connection c = dbUtils.connect();
        Vector<Mobilite> lesMobs = new Vector();
        
        System.out.print(nom);
        //D'abord le nombre d'albums
        String sql = "SELECT dm.refDemMob, dm.dateDepotDemMob, dm.etatDemMob, dm.numEtudiant, dm.codeDip FROM demandemobilites dm, diplomes d, universites u WHERE dm.codeDip = d.codeDip AND d.nomU = u.nomU AND u.nomU = '" + nom + "'";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Mobilite uneMob = null;
        try{
            while (rs.next()){
                uneMob = new Mobilite();
                uneMob.setReference(rs.getString("refDemMob"));
                uneMob.setDate(rs.getString("dateDepotDemMob"));
                uneMob.setEtat(rs.getString("etatDemMob"));
                uneMob.setNumE(Integer.parseInt(rs.getString("numEtudiant")));
                uneMob.setCodeD(Integer.parseInt(rs.getString("codeDip")));
                lesMobs.add(uneMob);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesMobs;
    }
    
    
    public static Vector<Mobilite> getMobiliteParD(String intitule){
        java.sql.Connection c = dbUtils.connect();
        Vector<Mobilite> lesMobs = new Vector();
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandemobilites dm, diplomes d WHERE d.codeDip = dm.codeDip AND intituleDip = '" + intitule + "'";
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Mobilite uneMob = null;
        try{
            while (rs.next()){
                uneMob = new Mobilite();
                uneMob.setReference(rs.getString("refDemMob"));
                uneMob.setDate(rs.getString("dateDepotDemMob"));
                uneMob.setEtat(rs.getString("etatDemMob"));
                uneMob.setNumE(Integer.parseInt(rs.getString("numEtudiant")));
                uneMob.setCodeD(Integer.parseInt(rs.getString("codeDip")));
                lesMobs.add(uneMob);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesMobs;
    }
    
    
    
    public static void ajoutMobilite(String ref, String date, String etat, int num, int code){
        java.sql.Connection c = dbUtils.connect();
        dbUtils.query(c, "SET NAMES 'UTF8'");
        if(getMobiliteParE(num) == null){
            String sql = "INSERT INTO demandemobilites (refDemMob,dateDepotDemMob,etatDemMob,numEtudiant,codeDip) VALUES('"+ref+"','"+date+"','"+etat+"',"+num+","+code+")";
            System.out.print(sql);
            dbUtils.update(c,sql);
        }
    }
    
    public static void modifMobilite(String ref, String date, String etat, int num, int code){
        java.sql.Connection c = dbUtils.connect();
        dbUtils.query(c, "SET NAMES 'UTF8'");
        String sql = "UPDATE demandemobilites SET dateDepotDemMob =  '"+date+"', etatDemMob = '"+etat+"', numEtudiant = "+num+", codeDip = "+code+" WHERE refDemMob = '"+ref+"'";
        dbUtils.update(c,sql);
    }
    
    public static void suppMobilite(String ref){
        java.sql.Connection c = dbUtils.connect();
        dbUtils.query(c, "SET NAMES 'UTF8'");
        String sql = "DELETE FROM demandemobilites WHERE refDemMob = '"+ref+"'";
        dbUtils.update(c,sql);
        
    }
    
    
    
    
    
    
    
    
   /* public static void updateQuantity(){
        java.sql.Connection c = dbUtils.connect();
        
        String sql = "update album set ";
        sql += 
    }
    */

    /**
     * @return the reference
     */
    public String getReference() {
        return reference;
    }

    /**
     * @param reference the reference to set
     */
    public void setReference(String reference) {
        this.reference = reference;
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
     * @return the numE
     */
    public int getNumE() {
        return numE;
    }

    /**
     * @param numE the numE to set
     */
    public void setNumE(int numE) {
        this.numE = numE;
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
}

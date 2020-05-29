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
public class Finance {
    
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
     * @return the montant
     */
    public double getMontant() {
        return montant;
    }

    /**
     * @param montant the montant to set
     */
    public void setMontant(double montant) {
        this.montant = montant;
    }

    /**
     * @return the idC
     */
    public int getIdC() {
        return idC;
    }

    /**
     * @param idC the idC to set
     */
    public void setIdC(int idC) {
        this.idC = idC;
    }
    
    private String reference;
    private String date;
    private String etat;
    private double montant;
    private int idC;

    public static Vector<Finance> getFinance(){
        Vector<Finance> lesFi = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandesfinancieres";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Finance uneFi = null;
        try{
            while (rs.next()){
                uneFi = new Finance();
                uneFi.setReference(rs.getString("RefDemandeFin"));
                uneFi.setDate(rs.getString("DateDepotDemFin"));
                uneFi.setEtat(rs.getString("EtatDemFin"));
                uneFi.setMontant(Double.parseDouble(rs.getString("MontantAccorde")));
                uneFi.setIdC(Integer.parseInt(rs.getString("idContrat")));
            
                lesFi.add(uneFi);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesFi;
    }
     public static Finance getFinance(String ref){
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandesfinancieres WHERE RefDemandeFin = '"+ref+"'";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Finance uneFi = null;
        try{
            if (rs.first()){
                uneFi = new Finance();
                uneFi.setReference(rs.getString("RefDemandeFin"));
                uneFi.setDate(rs.getString("DateDepotDemFin"));
                uneFi.setEtat(rs.getString("EtatDemFin"));
                uneFi.setMontant(Double.parseDouble(rs.getString("MontantAccorde")));
                uneFi.setIdC(Integer.parseInt(rs.getString("idContrat")));
            
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return uneFi;
    }
    
    
    
    
    
    public static Vector<Finance> getFinanceParContrat(int idC){
        Vector<Finance> lesFi = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandesfinancieres d, contrats c WHERE d.idContrat = c.idContrat AND  c.idContrat = "+idC;
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Finance uneFi = null;
        try{
            while (rs.next()){
                uneFi = new Finance();
                uneFi.setReference(rs.getString("RefDemandeFin"));
                uneFi.setDate(rs.getString("DateDepotDemFin"));
                uneFi.setEtat(rs.getString("EtatDemFin"));
                uneFi.setMontant(Double.parseDouble(rs.getString("MontantAccorde")));
                uneFi.setIdC(Integer.parseInt(rs.getString("idContrat")));
            
                lesFi.add(uneFi);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesFi;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public static Vector<Finance> getFinanceParProgramme(String intitule){
        Vector<Finance> lesFi = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * FROM demandesfinancieres d, contrats c, programmes p WHERE d.idContrat = c.idContrat AND c.intituleP = p.intituleP AND  p.intituleP = '"+intitule+"'";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Finance uneFi = null;
        try{
            while (rs.next()){
                uneFi = new Finance();
                uneFi.setReference(rs.getString("RefDemandeFin"));
                uneFi.setDate(rs.getString("DateDepotDemFin"));
                uneFi.setEtat(rs.getString("EtatDemFin"));
                uneFi.setMontant(Double.parseDouble(rs.getString("MontantAccorde")));
                uneFi.setIdC(Integer.parseInt(rs.getString("idContrat")));
            
                lesFi.add(uneFi);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesFi;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public static boolean ajoutFinance(String ref, String date, String etat, double montant, int id){
        boolean estBon = false;
        java.sql.Connection c = dbUtils.connect();
        String sql = "INSERT INTO demandesfinancieres (RefDemandeFin,DateDepotDemFin,EtatDemFin,MontantAccorde,idContrat) VALUES('"+ref+"','"+date+"','"+etat+"',"+montant+","+id+")";
        System.out.print(sql);
        if(dbUtils.update(c,sql)){
            estBon = true;
        }
        System.out.print(estBon);
        return estBon;
    }
    
    public static boolean modifFinance(String ref, String date, String etat, double montant, int id){
        boolean estBon = false;
        java.sql.Connection c = dbUtils.connect();
        dbUtils.query(c, "SET NAMES 'UTF8'");
        String sql = "UPDATE demandesfinancieres SET DateDepotDemFin =  '"+date+"', EtatDemFin = '"+etat+"', MontantAccorde = "+montant+", idContrat = "+id+" WHERE RefDemandeFin = '"+ref+"'";
        if(dbUtils.update(c,sql)){
            estBon = true;
        }
        return estBon;
    }        
            
            
    public static void suppFinance(String ref){
        java.sql.Connection c = dbUtils.connect();
        String sql = "DELETE FROM demandesfinancieres WHERE RefDemandeFin = '"+ref+"'";
        dbUtils.update(c,sql);
        ;
    }
}

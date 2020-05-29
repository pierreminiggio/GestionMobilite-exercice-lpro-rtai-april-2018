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
public class Universite {
    
    private String nomU;
    
    public static Vector<Universite> getUni(){
        Vector<Universite> lesE = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * ";
        sql += "FROM universites";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Universite uneU = null;
        try{
            while (rs.next()){
                uneU = new Universite();
                uneU.setNomU(rs.getString("nomU"));
            
                lesE.add(uneU);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesE;
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * @return the nomU
     */
    public String getNomU() {
        return nomU;
    }

    /**
     * @param nomU the nomU to set
     */
    public void setNomU(String nomU) {
        this.nomU = nomU;
    }
    
    
    
}

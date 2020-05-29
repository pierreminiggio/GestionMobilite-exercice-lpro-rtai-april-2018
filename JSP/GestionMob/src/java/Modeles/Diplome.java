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
public class Diplome {
    
    /**
     * @return the code
     */
    public int getCode() {
        return code;
    }

    /**
     * @param code the code to set
     */
    public void setCode(int code) {
        this.code = code;
    }

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
    
    
    private int code;
    private String intitule;

    
    public static Vector<Diplome> getDiplomes(){
        Vector<Diplome> lesD = new Vector();
        
        java.sql.Connection c = dbUtils.connect();
        
        //D'abord le nombre d'albums
        String sql = "SELECT * ";
        sql += "FROM diplomes";
        
        java.sql.ResultSet rs = null;
        rs = dbUtils.query(c, sql);
        Diplome unD = null;
        try{
            while (rs.next()){
                unD = new Diplome();
                unD.setCode(Integer.parseInt(rs.getString("codeDip")));
                unD.setIntitule(rs.getString("intituleDip"));
            
                lesD.add(unD);
            }
            //Fermer le resultset
            rs.close();
        }catch (Exception e){
            //TODO
        }
        return lesD;
    }
    
    
    
}

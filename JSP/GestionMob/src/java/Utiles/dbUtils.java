/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Utiles;

import java.sql.SQLException;

/**
 *
 * @author Ssanchez
 */
public class dbUtils {
    public static java.sql.Connection connect(){
        java.sql.Connection c = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            c = java.sql.DriverManager.getConnection("jdbc:mysql://localhost:3306/gestionmobilite",
                    "root"
                    ,"");
        }
        catch (Exception e)
        {
            //TODO
        }
        return c;
    }
    
    public static void disconnect(java.sql.Connection c){
        try{
            c.close();
        }
        catch (Exception e){
            //TODO
        }
    }
    
    public static java.sql.ResultSet query(java.sql.Connection c, String sql){
        java.sql.ResultSet rs = null;
        try{
            java.sql.Statement s = c.createStatement();
            rs = s.executeQuery(sql);
            //s.close();
        }
        catch (Exception e){
            //TODO
        }
        return rs;
    }
    
    public static boolean update(java.sql.Connection c, String sql){
        boolean estBon = false;
        try{
            System.out.print("test");
            java.sql.Statement s = c.createStatement();
            //dbUtils.query(c, "SET NAMES 'UTF8'");
            System.out.print("le nombre de lignes de res :"+s.executeUpdate(sql));
            if(s.executeUpdate(sql) > 0){
                estBon = true;
            }
            s.close();
        }
        catch (Exception e){
           //TODO
        }
        return estBon;
    }
}

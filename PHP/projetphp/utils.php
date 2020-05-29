<?php
class Utils{
    static function connecter(){
        $username = 'root';
        $password = '';
        $conn = null;
        try {
            $conn = new PDO ('mysql:host=localhost;dbname=gestionmobilite;charset=utf8',$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo 'Echec de connexion:'.$e->getMessage();
        }
        return $conn;
    }
    
    static function deconnecter($conn) {
        $conn = null;
    }
    
    static function querySQL($sql, $conn) {
        try {
            $result = $conn->query($sql);
            return $result;
        } catch (PDOException $ex) {
            echo "Erreur SQL";
        }
        
    }
    
    static function execSQL($sql, $conn) {
        try {
        $conn->exec($sql);
        } catch (PDOException $ex) {
            echo "Vous ne pouvez pas ajouter, modifier, ou supprimer cet élément car un autre élément de la base de données en est dépendant ou bien il a déjà été ajouté.<br>N'écoutez pas l'éventuel message de succès ci-dessous s'il est présent, il MENT!";
        }
    }
}

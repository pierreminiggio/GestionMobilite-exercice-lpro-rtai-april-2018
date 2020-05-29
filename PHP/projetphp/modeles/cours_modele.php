<?php
class Cours{
    public $codeCours;
    public $libelleCours;
    public $nbEcts;
    
    public function __construct($codeCours, $libelleCours, $nbEcts) {
        $this->codeCours = $codeCours;
        $this->libelleCours = $libelleCours;
        $this->nbEcts = $nbEcts;
        
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM cours;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $cours) {
            $list[] = new Cours($cours['CodeCours'], $cours['libelleCours'], $cours['nbEcts']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function findD() {
        $codeDip = $_POST['codeDip'];
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = 'SELECT * FROM cours LEFT JOIN PROGDIPLOME ON cours.CodeCours = progdiplome.codeCours WHERE codeDip = '.$codeDip.';';
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $cours) {
            $list[] = new Cours($cours['CodeCours'], $cours['libelleCours'], $cours['nbEcts']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $libelleCours = $_POST['libelleCours'];
        $nbEcts = $_POST['nbEcts'];
 
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO cours (libelleCours, nbEcts) VALUES ("'.$libelleCours.'", '.$nbEcts.');';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $codeCours = $_POST['codeCours'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM cours WHERE CodeCours = '.$codeCours.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $codeCours = $_POST['codeCours'];
        $libelleCours = $_POST['libelleCours'];
        $nbEcts = $_POST['nbEcts'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE cours'
                . ' SET libelleCours = "'.$libelleCours.'", nbEcts = '.$nbEcts
                . ' WHERE CodeCours = '.$codeCours.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function prog() {
        $codeCours = $_POST['codeCours'];
        $codeDip = $_POST['codeDip'];
 
        try {
            include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO progdiplome (codeCours, codeDip) VALUES ('.$codeCours.', '.$codeDip.');';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
        } catch (Exception $ex) {
            echo '<h2 style="color: red;">Ce cours est déjà programmé pour ce diplome!</h2>';
        }
        
    }
    
    public static function deprog() {
        $codeCours = $_POST['codeCours'];
        $codeDip = $_POST['codeDip'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM progdiplome WHERE codeCours = '.$codeCours.' AND codeDip = '.$codeDip.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
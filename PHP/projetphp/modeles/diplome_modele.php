<?php
class Diplome{
    public $codeDip;
    public $intituleDip;
    public $adresseWebD;
    public $niveau;
    public $nomU;
    
    public function __construct($codeDip, $intituleDip, $adresseWebD, $niveau, $nomU) {
        $this->codeDip = $codeDip;
        $this->intituleDip = $intituleDip;
        $this->adresseWebD = $adresseWebD;
        $this->niveau = $niveau;
        $this->nomU = $nomU;
        
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM diplomes;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $diplome) {
            $list[] = new Diplome($diplome['codeDip'], $diplome['intituleDip'], $diplome['adresseWebD'], $diplome['niveau'], $diplome['nomU']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function findU() {
        $nomU = $_POST['nomU'];
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = 'SELECT * FROM diplomes WHERE nomU = "'.$nomU.'";';
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $diplome) {
            $list[] = new Diplome($diplome['codeDip'], $diplome['intituleDip'], $diplome['adresseWebD'], $diplome['niveau'], $diplome['nomU']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $intituleDip = $_POST['intituleDip'];
        $adresseWebD = $_POST['adresseWebD'];
        $niveau = $_POST['niveau'];
        $nomU = $_POST['nomU'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO diplomes (intituleDip, adresseWebD, niveau, nomU) VALUES ("'.$intituleDip.'", "'.$adresseWebD.'", "'.$niveau.'", "'.$nomU.'");';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $codeDip = $_POST['codeDip'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM diplomes WHERE codeDip = '.$codeDip.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $codeDip = $_POST['codeDip'];
        $intituleDip = $_POST['intituleDip'];
        $adresseWebD = $_POST['adresseWebD'];
        $niveau = $_POST['niveau'];
        $nomU = $_POST['nomU'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE diplomes'
                . ' SET intituleDip = "'.$intituleDip.'", adresseWebD = "'.$adresseWebD.'", niveau = "'.$niveau.'", nomU = "'.$nomU.'"'
                . ' WHERE codeDip = '.$codeDip.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
<?php
class Universite{
    public $nomU;
    public $adressePostaleU;
    public $adresseWebU;
    public $adresseElectU;
    
    public function __construct($nomU, $adressePostaleU, $adresseWebU, $adresseElectU) {
        $this->nomU = $nomU;
        $this->adressePostaleU = $adressePostaleU;
        $this->adresseWebU = $adresseWebU;
        $this->adresseElectU = $adresseElectU;
        
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM universites;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $universite) {
            $list[] = new Universite($universite['nomU'], $universite['adressePostaleU'], $universite['adresseWebU'], $universite['adresseElectU']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    // non utilisée
    public static function find() {
        $nomU = $_POST['nomU'];
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = 'SELECT * FROM universites WHERE nomU = "'.$nomU.'";';
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $universite) {
            $list[] = new Universite($universite['nomU'], $universite['adressePostaleU'], $universite['adresseWebU'], $universite['adresseElectU']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $nomU = $_POST['nomU'];
        $adressePostaleU = $_POST['adressePostaleU'];
        $adresseWebU = $_POST['adresseWebU'];
        $adresseElectU = $_POST['adresseElectU'];

        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO universites (nomU, adressePostaleU, adresseWebU, adresseElectU) VALUES ("'.$nomU.'", "'.$adressePostaleU.'", "'.$adresseWebU.'", "'.$adresseElectU.'");';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $nomU = $_POST['nomU'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM universites WHERE nomU = "'.$nomU.'";';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $nomU = $_POST['nomU'];
        $adressePostaleU = $_POST['adressePostaleU'];
        $adresseWebU = $_POST['adresseWebU'];
        $adresseElectU = $_POST['adresseElectU'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE universites'
                . ' SET adressePostaleU = "'.$adressePostaleU.'", adresseWebU = "'.$adresseWebU.'", adresseElectU = "'.$adresseElectU.'"'
                . ' WHERE nomU = "'.$nomU.'";';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
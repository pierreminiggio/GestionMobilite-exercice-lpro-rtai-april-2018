<?php
class Etudiant{
    public $numEtudiant;
    public $nomEt;
    public $prenomEt;
    public $email;
    public $cv;
    public $codeDip;
    
    public function __construct($numEtudiant, $nomEt, $prenomEt, $email, $cv, $codeDip, $intituleDip) {
        $this->numEtudiant = $numEtudiant;
        $this->nomEt = $nomEt;
        $this->prenomEt = $prenomEt;
        $this->email = $email;
        $this->cv = $cv;
        $this->codeDip = $codeDip;  
        $this->intituleDip = $intituleDip;  
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM etudiants LEFT JOIN diplomes ON etudiants.codeDip = diplomes.codeDip;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $etudiant) {
            $list[] = new Etudiant($etudiant['numEtudiant'], $etudiant['nomEt'], $etudiant['prenomEt'], $etudiant['email'], $etudiant['cv'], $etudiant['codeDip'], $etudiant['intituleDip']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    // non utilisée
    public static function find() {
        $numEtudiant = $_POST['numEtudiant'];
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = 'SELECT * FROM etudiants WHERE numEtudiant = '.$numEtudiant.';';
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $etudiant) {
            $list[] = new Etudiant($etudiant['numEtudiant'], $etudiant['nomEt'], $etudiant['prenomEt'], $etudiant['email'], $etudiant['cv'], $etudiant['codeDip'], $etudiant['intituleDip']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $nomEt = $_POST['nomEt'];
        $prenomEt = $_POST['prenomEt'];
        $email = $_POST['email'];
        $cv = $_POST['cv'];
        $codeDip = $_POST['codeDip'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO etudiants (nomEt, prenomEt, email, cv, codeDip) VALUES ("'.$nomEt.'", "'.$prenomEt.'", "'.$email.'", "'.$cv.'", "'.$codeDip.'");';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $numEtudiant = $_POST['numEtudiant'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM etudiants WHERE numEtudiant = '.$numEtudiant.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $numEtudiant = $_POST['numEtudiant'];
        $nomEt = $_POST['nomEt'];
        $prenomEt = $_POST['prenomEt'];
        $email = $_POST['email'];
        $cv = $_POST['cv'];
        $codeDip = $_POST['codeDip'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE etudiants'
                . ' SET nomEt = "'.$nomEt.'", prenomEt = "'.$prenomEt.'", email = "'.$email.'", cv = "'.$cv.'", codeDip = "'.$codeDip.'"'
                . ' WHERE numEtudiant = '.$numEtudiant.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
<?php
class Programme{
    public $intituleP;
    public $explication;
    
    public function __construct($intituleP, $explication) {
        $this->intituleP = $intituleP;
        $this->explication = $explication;
        
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM programmes;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $programme) {
            $list[] = new Programme($programme['intituleP'], $programme['explication']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $intituleP = $_POST['intituleP'];
        $explication = $_POST['explication'];

        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO programmes (intituleP, explication) VALUES ("'.$intituleP.'", "'.$explication.'");';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $intituleP = $_POST['intituleP'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM programmes WHERE intituleP = "'.$intituleP.'";';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $intituleP = $_POST['intituleP'];
        $explication = $_POST['explication'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE programmes'
                . ' SET explication = "'.$explication.'"'
                . ' WHERE intituleP = "'.$intituleP.'";';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
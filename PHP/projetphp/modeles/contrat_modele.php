<?php
class Contrat{
    public $idContrat;
    public $duree;
    public $etatContrat;
    public $ordre;
    public $codeDip;
    public $intituleDip;
    public $intituleP;
    public $refDemMob;
    
    public function __construct($idContrat, $duree, $etatContrat, $ordre, $codeDip, $intituleDip, $intituleP, $refDemMob) {
        $this->idContrat = $idContrat;
        $this->duree = $duree;
        $this->etatContrat = $etatContrat;
        $this->ordre = $ordre;
        $this->codeDip = $codeDip;
        $this->intituleDip = $intituleDip;
        $this->intituleP = $intituleP;
        $this->refDemMob = $refDemMob;
    }
    
    
    public static function show() {
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = "SELECT * FROM contrats LEFT JOIN DIPLOMES ON contrats.codeDip = diplomes.codeDip;";
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $contrat) {
            $list[] = new Contrat($contrat['idContrat'], $contrat['duree'], $contrat['etatContrat'], $contrat['ordre'], $contrat['codeDip'], $contrat['intituleDip'], $contrat['intituleP'], $contrat['refDemMob']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function findU() {
        $nomU = $_POST['nomU'];
        $list = array();
        include_once 'utils.php';
        $conn = Utils::connecter();
        
        $sql = 'SELECT * FROM contrats LEFT JOIN diplomes ON contrats.codeDip = diplomes.codeDip WHERE nomU = "'.$nomU.'";';
        $result = Utils::querySQL($sql, $conn);
        
        foreach ($result-> fetchAll() as $contrat) {
            $list[] = new Contrat($contrat['idContrat'], $contrat['duree'], $contrat['etatContrat'], $contrat['ordre'], $contrat['codeDip'], $contrat['intituleDip'], $contrat['intituleP'], $contrat['refDemMob']);
        }
        
        Utils::deconnecter($conn);
        return $list;
    }
    
    public static function add() {
        $duree = $_POST['duree'];
        $etatContrat = $_POST['etatContrat'];
        $ordre = $_POST['ordre'];
        $codeDip = $_POST['codeDip'];
        $intituleP = $_POST['intituleP'];
        $refDemMob = $_POST['refDemMob'];

        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'INSERT INTO contrats (duree, etatContrat, ordre, codeDip, intituleP, refDemMob) '.
                'VALUES ('.$duree.', "'.$etatContrat.'", "'.$ordre.'", '.$codeDip.', "'.$intituleP.'", "'.$refDemMob.'");';
        
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function delete() {
        $idContrat = $_POST['idContrat'];
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'DELETE FROM contrats WHERE idContrat = '.$idContrat.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
    
    public static function update() {
        $idContrat = $_POST['idContrat'];
        $duree = $_POST['duree'];
        $etatContrat = $_POST['etatContrat'];
        $ordre = $_POST['ordre'];
        $codeDip = $_POST['codeDip'];
        $intituleP = $_POST['intituleP'];
        $refDemMob = $_POST['refDemMob'];
        
        include_once 'utils.php';
        $conn = Utils::connecter();
        $sql = 'UPDATE contrats'
                . ' SET duree = '.$duree.', etatContrat = "'.$etatContrat.'", ordre = "'.$ordre.'", codeDip = '.$codeDip.', intituleP = "'.$intituleP.'", refDemMob = "'.$refDemMob.'"'
                . ' WHERE idContrat = '.$idContrat.';';
        Utils::execSQL($sql, $conn);
        
        Utils::deconnecter($conn);
    }
}
<?php
// Creation d'une classe
class Contact extends Database {
    private $Nom = '';
    private $adresseM = '';
    private $statut ='';
    private $demande ='';

    public function __construct() {
        parent::__construct();
    }
    
    public function getNom(){
        return $this->Nom;
    }

    public function setNom($Nom){
        return $this->Nom = $Nom;
    }

    public function getAdressM() {
        return $this->adresseM;
    }
    
    public function setAdressM($adresseM){
        return $this->adresseM = $adresseM;
    }

    public function getStatut(){
        return $this->statut;
    }

    public function setStatut($statut){
        return $this->statut = $statut;
    }

    public function getDemande(){
        return $this->demande;
    }
    
    public function setDemande($demande){
        return $this->demande = $demande;
    }

    // Permet de créer dans la base de donnée un ticket d'aide.
    public function EnvoieRequete(){
        $req = 'INSERT INTO `contact` (`Nom`,`email`,`statut`,`message`) VALUES (:Nom, :email, :statut, :messages)';
        $insert = $this->db->prepare($req);
        $insert->bindValue(':Nom',$this->Nom,PDO::PARAM_STR);
        $insert->bindValue(':email',$this->adresseM,PDO::PARAM_STR);
        $insert->bindValue(':statut',$this->statut,PDO::PARAM_STR);
        $insert->bindvalue(':messages',$this->demande,PDO::PARAM_STR);
        return $insert->execute();
    }

    // Permet de selectionner les différents ticket d'aide present dans la base de données.
    public function AffichageRequete(){
        $req = 'SELECT * FROM `contact`';
        $affichage = $this->db->query($req);
        $afficher = $affichage->fetchAll(PDO::FETCH_OBJ);
        return $afficher;
    }
}
?>
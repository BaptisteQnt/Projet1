<?php
include_once('../modeles/config.php');
include_once('../modeles/class.database.php');
class Utilisateur extends Database {
    private $identifiant = 0;
    private $nom_entreprise = "";
    private $numsiret = 0;
    private $adresse = "";
    private $ville = "";
    private $codepostale = "";
    private $email = "";
    private $nom_personne = "";
    private $patron = "";
    private $pass = "";


    public function __construct() {
        parent::__construct();
    }

    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function setIdentifiant($identifiant) {
        return $this->identifiant = $identifiant;
    }

    public function getNom_entreprise() {
        return $this->nom_entreprise;
    }

    public function setNom_entreprise($nom_entreprise) {
        return $this->nom_entreprise = $nom_entreprise;
    }

    public function getNdesiret() {
        return $this->numsiret;
    }

    public function setNdesiret($numsiret) {
        return $this->numsiret = $numsiret;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        return $this->adresse = $adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        return $this->ville = $ville;
    }

    public function getCodePostale() {
        return $this->codepostale;
    }

    public function setCodePostale($codepostale) {
        return $this->codepostale = $codepostale;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        return $this->email = $email;
    }

    public function getNompersonne() {
        return $this->nom_personne;
    }

    public function setNompersonne($nom_personne) {
        return $this->nom_personne = $nom_personne;
    }

    public function getPatron() {
        return $this->patron;
    }

    public function setPatron($patron) {
        return $this->patron = $patron;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        return $this->pass = $pass;
    }

    public function InscrireUtilisateur() {
       $req = 'INSERT INTO `entreprise` (`nom_entreprise`,`n_de_siret`,`adresse`,`ville`,`CodePostale`,`e_mail`,`mot_de_passe`,`nom_contact`,`patron`) VALUES (:Nom_entreprise, :numsiret, :adresse, :ville, :codepostale, :mail, :pass, :nompersonne, :patron)';
       $insert = $this->db->prepare($req);
       $insert->bindvalue(':Nom_entreprise',$this->nom_entreprise,PDO::PARAM_STR);
       $insert->bindvalue(':numsiret',$this->numsiret,PDO::PARAM_STR);
       $insert->bindvalue(':adresse',$this->adresse,PDO::PARAM_STR);
       $insert->bindvalue(':ville',$this->ville,PDO::PARAM_STR);
       $insert->bindValue(':codepostale',$this->codepostale,PDO::PARAM_STR);
       $insert->bindvalue(':mail',$this->email,PDO::PARAM_STR);
       $insert->bindvalue(':nompersonne',$this->nom_personne,PDO::PARAM_STR);
       $insert->bindValue(':patron',$this->patron,PDO::PARAM_STR);
       $insert->bindValue(':pass',$this->pass,PDO::PARAM_STR);
       return $insert->execute();
    }

    public function verifUtilisateur(){
        $req='SELECT identifiant, n_de_siret, e_mail FROM entreprise WHERE n_de_siret = :numsiret OR e_mail = :mail';
        $verif = $this->db->prepare($req);
        $verif->bindValue(':numsiret',$this->numsiret, PDO::PARAM_STR);
        $verif->bindvalue(':mail',$this->email,PDO::PARAM_STR);
        $verif->execute();
        return $verif->fetch(PDO::FETCH_OBJ);
    }

    public function verif(){
        $req = 'SELECT identifiant, nom_entreprise, n_de_siret, e_mail FROM entreprise';
        $verif = $this->db->query($req);
        return $verif ->fetchAll(PDO::FETCH_OBJ);
    }

    public function connexionUtilisateur() {
        $req = 'SELECT entreprise.`identifiant`,`nom_entreprise`,`n_de_siret`,`adresse`,`ville`,`CodePostale`,`e_mail`,`mot_de_passe`,`nom_contact`,`patron` FROM `entreprise`
        INNER JOIN role 
        ON entreprise.id_roles = role.id
        WHERE e_mail = :email';
        $connexion = $this->db->prepare($req);
        $connexion->bindValue(':email',$this->email,PDO::PARAM_STR);
        $connexion->execute();
        return $connexion->fetch(PDO::FETCH_OBJ);
    }

    public function modifierUtilisateur(){
        $req = 'UPDATE entreprise SET nom_entreprise = :nom_entreprise, adresse= :adresse,ville= :ville, departement= :departement, nom_contact= :nom_con WHERE identifiant= :id';
        $modification = $this->db->prepare($req);
        $modification->bindValue(':nom_entreprise',$this->nom_entreprise,PDO::PARAM_STR);
        $modification->bindValue(':adresse',$this->adresse,PDO::PARAM_STR);
        $modification->bindValue(':ville',$this->ville,PDO::PARAM_STR);
        $modification->bindValue(':departement',$this->departement,PDO::PARAM_STR);
        $modification->bindValue(':nom_con',$this->nom_personne,PDO::PARAM_STR);
        $modification->bindValue(':id',$this->identifiant,PDO::PARAM_INT);
        return $modification->execute();
    }

    public function supprimerUtilisateur(){
        $req ='DELETE FROM entreprise WHERE identifiant = :id';
        $suppression = $this->db->prepare($req);
        $suppression->bindValue(':id',$this->identifiant,PDO::PARAM_INT);
        return $suppression->execute();
    }

}

















?>
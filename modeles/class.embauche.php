<?php

// Creation d'une classe 
class Embauche extends Database {
    private $identifiant = 0;
    private $stagiaire = null;
    private $mineur = null;
    private $embauche = null;
    private $nom_contrats = null;
    private $id_entreprise = 0;

    public function __construct() {
        parent::__construct();
    }

    public function getIdentifiantEmb() {
        return $this->identifiant;
    }

    public function setIdentifiantEmb($identifiant) {
        return $this->identifiant = $identifiant;
    }

    public function getStagiaire() {
        return $this->stagiaire;
    }

    public function setStagiaire($stagiaire) {
        return $this->stagiaire = $stagiaire;
    }

    public function getMineur() {
        return $this->mineur;
    }

    public function setMineur($mineur) {
        return $this->mineur = $mineur;
    }

    public function getEmbauche() {
        return $this->embauche;
    }

    public function setEmbauche($embauche) {
        return $this->embauche = $embauche;
    }

    public function getNom_contrats() {
        return $this->nom_contrats;
    }

    public function setNom_contrats($nom_contrats) {
        return $this->nom_contrats = $nom_contrats;
    }

    public function getId_entreprise() {
        return $this->id_entreprise;
    }

    public function setId_entreprise($id_entreprise) {
        return $this->id_entreprise = $id_entreprise;
    }


// Permet a l'entreprise de remplir certains critère de recherche de stagiaire et de sauvegarder c'est critère dans la base de données.
    public function sendIdentifiant(){
        $req = 'INSERT INTO `embauche` (`stagiaire`,`mineur`,`embauche`,`Nom_contrat`,`id_entreprises`) VALUES (:stagiaire, :mineur, :embauche, :Nom_contrat, :id_entreprise)';
        $insert = $this->db->prepare($req);
        $insert->bindvalue(':stagiaire',$this->stagiaire,PDO::PARAM_STR);
        $insert->bindvalue(':mineur',$this->mineur,PDO::PARAM_STR);
        $insert->bindvalue(':embauche',$this->embauche,PDO::PARAM_STR);
        $insert->bindValue(':Nom_contrat',$this->nom_contrats,PDO::PARAM_STR);
        $insert->bindvalue(':id_entreprise',$this->id_entreprise,PDO::PARAM_INT);
        return $insert->execute();
    }

    // Permets de supprimer son annonce faite depuis la base de données.
    public function supprimerAnnonce(){
        $req ='DELETE FROM embauche WHERE id_entreprises = :id_entreprise';
        $suppression = $this->db->prepare($req);
        $suppression->bindValue(':id_entreprise',$this->id_entreprise, PDO::PARAM_INT);
        return $suppression->execute();
        
    }

    // Permet de selectionner les information remplie par l'entreprise depuis la base de données.
    public function selectInfo(){
        $req = 'SELECT embauche.identifiant, nom_entreprise, stagiaire, mineur, n_de_siret, embauche, Nom_contrat, id_entreprises FROM embauche 
        INNER JOIN entreprise ON entreprise.identifiant = embauche.id_entreprises 
        WHERE stagiaire = "Oui"';
        $affichage = $this->db->query($req);
        $afficher = $affichage->fetchAll(PDO::FETCH_OBJ);
        return $afficher;
    }

    // Permet de selectionner des information remplie par l'entreprise pour pouvoir créer des marqueur personnaliser sur la carte interactive.
    public function createMarks(){
        $req = 'SELECT embauche.id_entreprises, nom_entreprise, stagiaire, ville, adresse, CodePostale FROM embauche 
        INNER JOIN entreprise ON entreprise.identifiant = embauche.id_entreprises WHERE stagiaire = "Oui"';
        $affichage = $this->db->query($req);
        $afficher = $affichage->fetchAll(PDO::FETCH_OBJ);
        return $afficher;
    }
}






?>
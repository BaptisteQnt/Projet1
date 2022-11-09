<?php
// Creation d'une classe pour pouvoir entrer dans la base de données et modifier, creer, Selectionner, supprimer des donnes.
class Database {

    protected $db = null;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',LOGIN,PASSWORD);
        } catch(Exception $mess){
            $mess->getMessage();
        }
    }
}

// Permet (autorise) l'accès  a la base de donné //






?>
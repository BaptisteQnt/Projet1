<?php 

// PErmet d'appeler les differentes classe et d'appeler la fonction pour afficher les ticket depuis la base données.

$entreprise = new Utilisateur();

$contacte = new Contact();

$requete = $contacte->AffichageRequete();


?>
<?php
// Creation d'un objet 
$entreprise = new Embauche();
$entreprise->setId_entreprise($_SESSION['identifiant']);
$formSuccess = [];

// A l'interaction du bouton designer declanche le reste du code si-dessous.
if(isset($_POST['validation'])){
    // Verifie un input pour lui definir un valeur en fonction de si il est vide ou non.
    if(isset($_POST['ouistage'])){
        $stagiaire = 'Oui';
        $entreprise->setStagiaire($stagiaire); 
    } else {
        $stagiaire ='Non';
        $entreprise->setStagiaire($stagiaire);
    }
    // Verifie un input pour lui definir un valeur en fonction de si il est vide ou non.
    if(isset($_POST['ouimineur'])){
        $mineur = 'Oui';
        $entreprise->setMineur($mineur); 
    } else {
        $mineur ='Non';
        $entreprise->setMineur($mineur);
    }
    // Verifie un input pour lui definir un valeur en fonction de si il est vide ou non.
    if(isset($_POST['ouiembauche'])){
        $embauche = 'Oui';
        $entreprise->setEmbauche($embauche); 
    } else {
        $embauche ='Non';
        $entreprise->setEmbauche($embauche);
    }
    // Verifie un input pour lui definir un valeur en fonction de si il est vide ou non.
    if(isset($_POST['Aucun'])){
        $nom_contrats = 'Aucun';
        $entreprise->setNom_contrats($nom_contrats);
    } else if(isset($_POST['CDI'])){
        $nom_contrats = 'CDI';
        $entreprise->setNom_contrats($nom_contrats);
    } else if(isset($_POST['CDD'])){
        $nom_contrats = 'CDD';
        $entreprise->setNom_contrats($nom_contrats);
    } else if (isset($_POST['autre'])) {
        $nom_contrats = 'Apprentissage/Autre';
        $entreprise->setNom_contrats($nom_contrats);
    } else {
        $nom_contrats = null;
        $entreprise->setNom_contrats($nom_contrats);
    }
    
    // Permet de lancer les fonction de la classe embauche.
    $entreprise->supprimerAnnonce();
    $entreprise->sendIdentifiant();
    // Creation d'un message de succes pour les tableau de bors une fois les modification effectuer.
    $formSuccess['Suc'] = "Les changement ont été effectuer";
}
?>
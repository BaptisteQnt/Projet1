<?php
// Permet d'appeler la classe Contacte et de creation d'un objet.
$question = new Contact();

// Permet a l'interaction du bouton l'execution du code si dessous.
if(isset($_POST['envoyage'])){
    $formError = [];
    $formSucces = [];
    // Permet de verifier si les differents du formulaire ne sont pas vide
    if(!empty($_POST['nomcontact']) && !empty($_POST['adressecontact']) && !empty($_POST['statut']) && !empty($_POST['textdemande'])){
        $NomP = htmlspecialchars($_POST['nomcontact']);
        // Permet de définir le statut de la personne effactuant le massage
        if($_POST['statut'] == 'Un particulier'){
            $statut = 'Particulier';
        } else if($_POST['statut'] == 'Un stagiaire'){
            $statut = 'Stagiaire';
        } else if($_POST['statut'] == 'Une entreprise'){
            $statut = 'Entreprise';
        } else if($_POST['statut'] == 'Un employé'){
            $statut = 'Employé';
        } else {
            $formError['StatutErr'] = 'il faut remplir le champs statut';
        }
        $demande = htmlspecialchars($_POST['textdemande']);
        // Permet de verifier que le format mail est respecter dans le champs designer
        if(filter_var($_POST['adressecontact'],FILTER_VALIDATE_EMAIL)){
            $adressM = htmlspecialchars($_POST['adressecontact']);
        } else {
            $formError['MailInvalid'] = "Il faut mettre un format mail valide";
        }
    } else {
        $formError['inputvides'] = "Tous les champs doivent être remplis";
    }
    // Permet d'effectuer une commande dans la base de donnée si il n'y a aucune erreur.
    if(empty($formError)){
        $question->setNom($NomP);
        $question->setAdressM($adressM);
        $question->setStatut($statut);
        $question->setDemande($demande);
        $formSucces['bon'] = "Votre requête a bien été envoyer";
        $question->EnvoieRequete();
    }
}






?>
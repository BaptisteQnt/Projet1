<?php

// Permet d'appeler la classe Utilisateur et de creation d'un objet.
$entreprise = new Utilisateur();

// Permet a l'utilisation du bouton d'effectuer le code si dessous.
if(isset($_POST['validax'])){
    $formError = [];
    $formSuccess = [];
    // Permet de verifier si les champs designer ne sont pas vide.
    if(!empty($_POST['checkemail']) && !empty($_POST['mdp'])){
        // Verifie si le format est un format mail.
        if(filter_var($_POST['checkemail'],FILTER_VALIDATE_EMAIL)){
            $mail = htmlspecialchars($_POST['checkemail']);
        } else {
            $formError['mailValide'] = "il faut mettre une valeurs en format e-mail";
        }
        // Verifie si le mots de passe contient plus de 8 caractère.
        if(mb_strlen($_POST['mdp'])>=8){
            $pass = htmlspecialchars($_POST['mdp']);
        } else {
            $formError['passvalide'] = "Le mots de est trop court";
        }
    } else {
        $formError['inputVide'] = "Tous les champs doivent être rempli";
    }
    // Verifie si il'y a eu aucune erreur dans le formaulaire
    if(empty($formError)){
        $entreprise->setEmail($mail);
        $connexion = $entreprise->connexionUtilisateur();
        // Permet de stocker des différentes données dans la session
        if(is_object($connexion)){
            // Verifie si le mots de passe est correcte
            if(password_verify($pass, $connexion->mot_de_passe)){
                $_SESSION['identifiant'] = $connexion->identifiant;
                $_SESSION['nom_entreprise'] = $connexion->nom_entreprise;
                $_SESSION['numsiret'] = $connexion->n_de_siret;
                $_SESSION['adresse'] = $connexion->adresse;
                $_SESSION['email'] = $connexion->e_mail;
                $_SESSION['nom_personne'] = $connexion->nom_contact;
                $_SESSION['patron'] = $connexion->patron;
                $_SESSION['id_roles'] = $connexion->id_roles;
                header('Location: index.php?profil');
                exit();
                // $formError['profilExiste'] = "Vous êtes connecté";
            } else {
                $formError['passIncorrect'] = "Le mots de passe est incorrect";
            }
        } else {
            $formSuccess['succes'] = "L'adresse e-mail n'existe pas";
        }
    }
}

?>
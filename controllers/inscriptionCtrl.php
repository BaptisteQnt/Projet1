<?php
include_once('../modeles/inscription/class.utilisateur.php');
// Creation d'un objet et appel d'une classe
$entreprise = new Utilisateur();
    $formError = [];
    $formSuccess = [];
    $values = [];
    // Effectue un verification si les champs désigné ne sont pas vide.
    if(!empty($_POST['namecompany']) && !empty($_POST['siret']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['CodePostale']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['mdp'])) {
        $nomcompany = htmlspecialchars($_POST['namecompany']);
        $numsiret = htmlspecialchars($_POST['siret']);
        $namepersonne = htmlspecialchars($_POST['name']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $ville = htmlspecialchars($_POST['ville']);
        $codepostale = htmlspecialchars($_POST['CodePostale']);
        $patron = htmlspecialchars($_POST['patron']);
        // Verifie si le format est un format mail.
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $mailcomp = htmlspecialchars($_POST['email']);
        } else {
            $formError= 'il faut mettre un format de mail valide du type exemple@exemple.fr';
        }
        // Verifie si le mots de passe est assez long.
        if(mb_strlen($_POST['mdp'])>=8) {
            $pass = htmlspecialchars(password_hash($_POST['mdp'],PASSWORD_DEFAULT));
        } else {
            $formError= "Le mot de passe est trop court";
        }  
    } else {
        $formError = 'Tous les champs doivent être rempli';
    }
    // Permet de verifier si il n'y a aucune erreur et de lancer le code pour inscrire l'utilisateur.
    if(empty($formError)){
        $entreprise->setNom_entreprise($nomcompany);
        $entreprise->setNdesiret($numsiret);
        $entreprise->setEmail($mailcomp);
        $entreprise->setAdresse($adresse);
        $entreprise->setVille($ville);
        $entreprise->setCodePostale($codepostale);
        $entreprise->setPass($pass);
        $entreprise->setNompersonne($namepersonne);
        $entreprise->setPatron($patron);
        $verificateur = $entreprise->verifUtilisateur();
        // Verifie les différentes adresse mail dans la base de données et si l'utilisateur a deja un compte
        if(is_object($verificateur)){
            if($verificateur->e_mail == $entreprise->getEmail()) {
                $formError = "Vous avez déja un compte" ;
            }else if($verificateur->n_de_siret == $entreprise->getNdesiret()){
                $formError = "Le numeros de siret existe deja";
            }          
        } else {
            $entreprise->InscrireUtilisateur();
            $formError = 'Le profils est enregistré';
        }
    }
    // Envoie les differentes erreur en javascript.
    $res = [
        'error' => $formError,
        'success' => $formSuccess,
        
    ];
    header('Content-Type: application/json');
    echo json_encode($res); 
?>
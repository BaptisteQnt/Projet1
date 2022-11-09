<?php 
// Creation d'un objet 
$entreprise = new Utilisateur();
$entreprise->setEmail($_SESSION['email']);
$entreprise->setIdentifiant($_SESSION['identifiant']);
$entreprises = $entreprise->connexionUtilisateur();

// Permet a l'interaction du bouton de commancer les differentes etape etablit dans le code
if(isset($_POST['modifiateur'])){
    $formError = [];
    $tab = [];
    // Verifie si les differents champs désigner ne sont pas vide
    if(!empty($_POST['modifEntreprise']) && !empty($_POST['modifAdresse']) && !empty($_POST['modifVille']) && !empty($_POST['modifDepartement']) && !empty($_POST['modifContacte'])){
        $nomEntre = htmlspecialchars($_POST['modifEntreprise']);
        $adresseEntre = htmlspecialchars($_POST['modifAdresse']);
        $villeEntre = htmlspecialchars($_POST['modifVille']);
        $codePostale = htmlspecialchars($_POST['modifDepartement']);
        $contacteEntre = htmlspecialchars($_POST['modifContacte']);
        // Permet de lancer la procedure pour modifier le profils avec une securiter.
        if(!empty($_POST['oui'])){
            $entreprise->setNom_entreprise($nomEntre);
            $entreprise->setAdresse($adresseEntre);
            $entreprise->setVille($villeEntre);
            $entreprise->setCodePostale($codePostale);
            $entreprise->setNompersonne($contacteEntre);
            $entreprise->modifierUtilisateur();
            header('Location: index.php?profil');
        } else {
            $formError['NotValidation'] = 'Pour valider, veuillez remplire le validateur ci-dessus';
        }
    } else {
        $formError['champsVide'] = 'Veuillez remplir tout les champs pour valider';
    }
}
// Permet de lancer la procedure etablie pour supprimer son compte dans la base de données
if(isset($_POST['suppr2'])){
    $formError = [];
    // Permet d'ajouter un verificateur pour etre sur de vouloir supprimer son compte.
    if($_POST['test'] === 'VALIDER') {
        $entreprise->supprimerUtilisateur();
        session_destroy();
        header('Location: index.php?suppr'); 
    } else {
        $formError['NotSuppr'] = 'Veuillez remplir le champs si dessus pour pouvoir supprimer votre compte';
    }
}
?>
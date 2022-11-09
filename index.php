<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="views/asset/css/information.style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
            integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
            crossorigin=""/>
        <title>1Expérience</title>
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Début NavBar du site -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <a class="navbar-brand text-light fs-3 fw-bold ms-3" href="index.php?home">1Expérience</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light ms-3" href="index.php?home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light ms-3" href="index.php?stage">Stage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light ms-3" href="index.php?info">Informations</a>
                    </li>
                    <li class="nav-item dropdown">
                    <!-- Permet d'afficher les lien de connexion et d'inscription au utilisateur sans compte. -->
                    <?php if(empty($_SESSION['identifiant'])){ ?>      
                        <a class="nav-link dropdown-toggle text-light ms-3" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Entreprise
                        </a>
                        <div class="dropdown-menu bg-light text-danger">
                            <a class="dropdown-item text-dark text-danger" href="index.php?inscription">Inscription</a>
                            <a id="connecter" class="dropdown-item text-dark text-danger" href="index.php?connexion">Connexion</a>
                        
                        <?php } else { ?>
                        <a class="nav-link dropdown-toggle text-light ms-3" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu bg-light text-danger"> 
                            <a  class="dropdown-item text-dark text-light" href="index.php?profil">Profil</a>
                            <a  class="dropdown-item text-dark text-light" href="index.php?tbd">Tableau de Bord</a>  
                        <?php } ?>
                            <a class="dropdown-item text-dark text-light" href="index.php?contact">Nous contacter</a>
                        <?php if(!empty($_SESSION)){
                            if($_SESSION['id_roles'] == '1'){ ?>
                            <a class="dropdown-item text-dark text-light" href="index.php?admin1">Page administrateur</a>
                        <?php }}?>
                        </div>
                    </li>      
                </ul>
            </div>
            <!-- Permet d'afficher un bouton deconnexion quand l'utilisateur est connecter. -->
            <?php if(!empty($_SESSION['identifiant'])){ ?>
                
                <a class="nav-link text-light" href="index.php?deconnexion">Déconnexion</a>   
            <?php } ?>  
        </nav>
        <!-- Fin de la NavBar du site -->
        <!-- Début du routeur du site internet pour la navigation entre les pages -->
        <div class="bgimage">
            <div class="bgimportant">
                <?php
                    if(isset($_GET['home'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('views/accueil.php');
                    } else if(isset($_GET['stage'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.embauche.php');
                        include_once('controllers/stageCtrl.php');
                        include_once('views/stage.php');
                    } else if(isset($_GET['info'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('views/information.php');
                    } else if(isset($_GET['inscription'])) {
                        include_once('views/inscription.php');
                    }  else if(isset($_GET['connexion'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.utilisateur.php');
                        include_once('modeles/class.embauche.php');
                        include_once('controllers/connexionCtrl.php');
                        include_once('views/connexion.php');
                    } else if(isset($_GET['deconnexion'])){
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('controllers/deconnexionCtrl.php');
                    } else if(isset($_GET['contact'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.contact.php');
                        include_once('controllers/contactCtrl.php');
                        include_once('views/contactus.php');
                    } else if(isset($_GET['profil'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.utilisateur.php');
                        include_once('controllers/profilsCtrl.php');
                        include_once('views/profil.php');
                    } else if(isset($_GET['suppr'])) {
                        include_once('views/ConfirmSuppr.php');
                    } else if(isset($_GET['tbd'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.utilisateur.php');
                        include_once('modeles/class.embauche.php');
                        include_once('controllers/TableaudebordCtrl.php');
                        include_once('views/tableaudebord.php');
                    } else if(isset($_GET['admin1'])) {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('modeles/class.utilisateur.php');
                        include_once('modeles/class.contact.php');
                        include_once('controllers/adminCtrl.php');
                        include_once('views/admin.php');
                    } else {
                        include_once('modeles/config.php');
                        include_once('modeles/class.database.php');
                        include_once('views/accueil.php');
                    }
                ?>
            </div>       
        </div>
        <!-- Fin du routeur du site internet pour la navigation entre les pages -->    
        <!-- Début du footer -->
        <div class="bg-danger mt-5">
            <div class="d-flex bd-highlight">
                <div class="p-1 flex-fill bd-highlight ms-5 text-center m-5">
                    <h4 class="text-light">Nos reseaux ...</h4>
                    <nav class="nav flex-column">
                        <a class="nav-link text-light" href="#">Facebook</a>
                        <a class="nav-link text-light" href="#">Instagrame</a>
                        <a class="nav-link text-light" href="#">LinkdIn</a>
                        <a class="nav-link text-light" href="#">Twitter</a>
                    </nav>
                </div>
                <div class="p-2 flex-fill bd-highlight w-25 m-5 text-light">
                    <h4 class="text-center">Les site utilile pour trouver un emplois/formations</h4>
                    <nav class="nav flex-column">
                        <a class="nav-link text-light text-center" href="https://www.pole-emploi.fr/accueil/">Pole_emplois</a>
                        <a class="nav-link text-light text-center" href="https://fr.indeed.com/">Indeed</a>
                        <a class="nav-link text-light text-center" href="https://fr.linkedin.com/">LinkdeIn</a>            
                    </nav>   
                </div>
                <div class="p-2 flex-fill bd-highlight m-5">
                    <h4 class="text-center mb-3 text-light">Les pages du site</h4>
                    <div class="d-flex bd-highlight text-center">
                        <div class="p-2 flex-fill bd-highlight">
                            <nav class="nav flex-column">
                                <a class="nav-link text-light" href="index.php?home">Accueil</a>
                                <a class="nav-link text-light" href="index.php?stage">Stage</a>
                                <a class="nav-link text-light" href="index.php?info">Informations</a>
                                
                            </nav>
                        </div>
                        <div class="p-2 flex-fill bd-highlight">
                            <nav class="nav flex-column">
                                <a class="nav-link text-light" href="index.php?inscription">Inscription</a>
                                <a class="nav-link text-light" href="index.php?connexion">Connexion</a>
                                <a class="nav-link text-light" href="index.php?contact">Nous contacter</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pb-1">
                <small class=" text-white-50">Ce projet est un projet réaliser pour l'obtention de mon titre professionel lors de ma formation en 2022 et n'est pas destinée a etre mis en ligne.</small>
            </div>
        </div>
        <!-- Fin du footer -->
        <script type="text/javascript" src="">$('#myModal').on('shown.bs.modal', function() { $('#myInput').trigger('focus')})</script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>












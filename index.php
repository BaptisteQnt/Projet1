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
        <div class="d-flex justify-content-evenly bg-danger mt-5">
            <div class="mt-3 mb-3">
                <ul class="text-center  list-group">
                    <a href="https://www.pole-emploi.fr" target="_blank" ><li class="bg-danger text-light text-decoration-underline fw-bold border-0 list-group-item">Pôle Emplois</li></a>
                    <a href="https://www.linkedin.com" target="_blank" ><li class="bg-danger text-light text-decoration-underline fw-bold border-0 list-group-item">LinkedIn</li></a>
                    <a href="https://fr.indeed.com" target="_blank" ><li class="bg-danger text-light text-decoration-underline fw-bold border-0 list-group-item">Indeed</li></a>
                </ul>
            </div>
            <div class="mt-3 mb-3">
                <p class="text-start text-wrap text-light"><span class="fs-2 fw-bold me-2">1Experience,</span> un outil pour vous aidez et nous aider.</p>
                <div class="text-center d-flex">
                    <div class="p-2 flex-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:white" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </div>
                    <div class="p-2 flex-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:white" width="40" height="40" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                    </div>
                    <div class="p-2 flex-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:white" width="40" height="40" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du footer -->
        <script type="text/javascript" src="">$('#myModal').on('shown.bs.modal', function() { $('#myInput').trigger('focus')})</script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        
        
    </body>
</html>












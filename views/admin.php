<?php 
// Permet d'identifier l'administrateur du site et de faire apparaitre sur la page les fonctionnalité et les donnees dont il a besoin.
if(!empty($_SESSION)){ 
if($_SESSION['id_roles'] == "1"){ ?>
    <div class="mt-5 container">
        <h1>Page administrateur du site 1Experience</h1>
        <div class="container mt-5">
            <h3>Liste des tickets de demande d'aide ou autre</h3>
            <div style="max-height: 85vh;" class=" mt-5 overflow-scroll border border-round">
                <div class="d-flex justify-content-around mt-5 flex-wrap ">
                <?php foreach ($requete as $key => $affichage) { ?>
                    <div class="container m-3 border border-primary rounded">
                        <h5 class="card-title">Nom : <?= $affichage->Nom ?></h5>
                        <h6 class="card-subtitle mt-2 mb-2 text-danger">adresse Mail : <?= $affichage->email ?></h6>
                        <h6 class="card-subtitle mb-2 text-danger">Statut : <?= $affichage->statut ?></h6>
                        <p class="card-text"> <?= $affichage->message ?></p>
                    </div>    
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<!-- Permet d'afficher au autre utilisateur sur cette page un message d'erreur car il n'ont pas acces au donnees administrateur -->
<?php } if($_SESSION['id_roles'] == "2"){ ?>
    <div class="mt-5 container">
    <h1 class="text-center mt-5 text-danger">Vous n'êtes pas autorisé a entrer sur cette page.</h1>
    <div>
        <img src="views/asset/img/2762862.jpg" class="img-fluid" alt="...">
    </div>
    <h4 class="mt-5">Vous vous êtes perdu sur le site et êtes tombé sur cette page ? Ce n'est pas grave, vous allez être redirigé sur l'accueil automatiquement.</h4>
    <p class="mt-4 ">Cette page est réservée aux administrateurs du site. Elle sert notament a recueillir les demande de contacte faite par d'autres utilisateurs</p>
    <div class="mt-4">
        <small class="text-secondary">Si la redirection ne marche pas vous pourrez toujours appuyer sur le nom du site dans la barre de navigation.</small>
    </div>
</div>
<script>
    document.addEventListener("onload", redirection())
    function redirection(){
        setTimeout(myURL,10000);
    }
    function myURL (){
        document.location.href = "http://localhost/projet1/index.php";
    }
</script>
<?php }} else { ?>
<div class="mt-5 container">
    <h1 class="text-center mt-5 text-danger">Vous n'êtes pas autorisé a entrer sur cette page.</h1>
    <div>
        <img src="views/asset/img/2762862.jpg" class="img-fluid" alt="...">
    </div>
    <h4 class="mt-5">Vous vous êtes perdu sur le site et êtes tombé sur cette page ? Ce n'est pas grave, vous allez être redirigé sur l'accueil automatiquement.</h4>
    <p class="mt-4 ">Cette page est réserver aux administrateurs du site. Elle sert nottament a recueillir les demandes de contacte faite par d'autres utilisateurs</p>
    <div class="mt-4">
        <small class="text-secondary">Si la redirection ne marche pas vous pourrez toujours appuyer sur le nom du site dans la barre de navigation.</small>
    </div>
</div>
<script>
    document.addEventListener("onload", redirection())
    function redirection(){
        setTimeout(myURL,10000);
    }
    function myURL (){
        document.location.href = "http://localhost/projet1/index.php";
    }
</script>

<?php } ?>

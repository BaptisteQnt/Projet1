<div class="container mt-5">
    <h2 class="mb-4">Connexion</h2>
    <p class="mb-5">Remplissez les différents champs pour se connecter</p>
    <!-- Permet de mettre des message d'erreur en fonction des erreur apparue, Champs vide, mauvais format de donnes .... -->
    <?php
    if(isset($formError['passIncorrect'])){ ?>
    <small class="form-text  text-danger"><?= $formError['passIncorrect'] ?></small>
    <?php } ?>
        
    <?php
    if(isset($formError['passValide'])){ ?>
    <small class="form-text  text-danger"><?= $formError['passValide'] ?></small>
    <?php } ?>
        
    <?php 
    if(isset($formError['inputVide'])){ ?>
    <small class="form-text  text-danger"><?= $formError['inputVide'] ?></small>
    <?php } else if(isset($formSucces['succes'])) { ?>
    <small class="form-text  text-success"><?= $formSucces['succes'] ?></small>
    <?php }  else if (isset($formError['mailValide'])){ ?>
    <small class="form-text  text-danger"><?= $formError['mailValide'] ?></small>
    <?php }?>
    <!-- Affiche un message de succes quand l'utilisateur a reussie la connexion a son compte existant -->
    <?php
    if(isset($formError['profilExiste'])){ ?>
    <small class="form-text  text-success"><?= $formError['profilExiste'] ?></small>
    <?php } ?>
    
    <form method="POST">
        <div class="form-group mt-3 mb-3">
            <label for="exampleInputEmail1">Adresse mail</label>
            <input name="checkemail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input name="mdp" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="validax" type="submit" onclick="changeClass()" class="btn btn-danger mt-4">Se connecter</button>
    </form>
</div>
<div class="container mt-5">
    <div class="text-center">
        <h2 class="mb-4">Inscription</h2>
        <div class="text-center text-Sucess" id="formSuccess">
        </div>
        <!-- Permet d'afficher des message d'erreur pour les differents champs present sur la page -->
        <?php
            if(isset($formError['passValide'])){ ?>
                    <small class="form-text  text-danger"><?= $formError['passValide'] ?></small>
                <?php } ?>
            <?php 
            if(isset($formError['inputVide'])){ ?>
                <small class="form-text  text-danger"><?= $formError['inputVide'] ?></small>
            <?php } else if(isset($formSucces['succes'])) { ?>
                <small class="form-text  text-success"><?= $formSucces['succes'] ?></small>
            <?php }
            ?>
            <?php
                if(isset($formError['profilExiste'])){ ?>
                    <small class="form-text  text-danger"><?= $formError['profilExiste'] ?></small>
                <?php }
            ?>
    </div>
    <form class="" method="POST">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Nom de l'entreprise</label>
            <input name="namecompany" type="text" class="form-control" id="valeur1" aria-describedby="emailHelp" placeholder="Exemple : Renault, Sncf, Auchan ...">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">N° de SIRET</label>
            <input name="siret" type="text" class="form-control" id="valeur2">
        </div>
        <div class="form-group mb-3">
            <div class="form-group">
                <label for="inputAddress">Adresse</label>
                <input name="adresse" type="text" class="form-control" id="valeur3" placeholder="25 rue des mimosa">
            </div>
            <div class="form-row">
                <div class="d-inline-flex form-group col-md-4">
                    <label class="me-3" for="inputCity">Ville</label>
                    <input name="ville" type="text" class="form-control" id="valeur4" placeholder="Paris">
                </div>
                <div class="mt-4 d-inline-flex form-group col-md-4">
                    <label class=" ms-5 me-4" for="inputState">Code Postale</label>
                    <input name="CodePostale" type="text" class="form-control" id="valeur5" placeholder="75000" required />
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Adresse e-mail de l'entreprise</label>
            <input type="email" name="email" class="form-control" id="valeur6" aria-describedby="emailHelp" placeholder="Nomentreprise@exemple.com">
            <!-- Message d'erreur -->
            <?php
                if(isset($formError['mailExiste'])){ ?>
                    <small class="form-text  text-danger"><?= $formError['mailExiste'] ?></small>
                <?php 
                 } else if (isset($formError['mailValide'])){ ?>
                    <small class="form-text  text-danger"><?= $formError['mailValide'] ?></small>
            <?php }
            ?>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Votre nom</label>
            <input name="name" type="text" class="form-control" id="valeur7" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Pour inscrire l'entreprise, ce n'est pas un responsable qui est obligé de le faire. Mais vaudrait mieux lui en parler avant !</small>
        </div>
        <div class="form-group form-check mb-3">
            <input type="checkbox" name="patron"  class="form-check-input" id="valeur9">
            <label class="form-check-label" for="exampleCheck1">Êtes-vous un des responsable de l'entreprise ?</label>
        </div>
        <div class="form-group mb-5">
            <label for="exampleInputPassword1">Password</label>
            <input name="mdp" id="valeur8" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <!-- <button name="validax" type="submit" class="btn btn-danger mt-2 mb-3 btn-block">Inscription</button> -->
        <div class="text-center text-primary" id="formError">

        </div>
        <button type="button" name="validax" onclick="geo(geolocal);"  class="btn btn-danger mt-2 mb-3 btn-block">Inscription</button>    
    </form>
    
</div>
<script src="views/asset/js/script.js"></script>
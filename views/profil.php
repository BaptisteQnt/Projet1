<div>
    <h2 class="text-center mt-5">Page de votre profils</h2>
    <div class="text-center mt-5 mb-5">
        <img src="views/asset/img/avatar1.png" width="20%" height="200vh"/>
    </div>
    
    <div class="text-center mt-5">
        <p class="d-inline">Votre entreprise :</p>
        <p class="d-inline"> 
            <?php echo $entreprises->nom_entreprise ?>
        </p>
    </div>
    <div class="text-center mt-4">
        <p class="d-inline">adresse :</p>
        <p class="d-inline">
             <?php echo $entreprises->ville ?>, 
        </p>
    </div>
    <div class="text-center mt-4">
        <p class="d-inline">Votre adresse mail :</p>
        <p class="d-inline">
            <?php echo $entreprises->e_mail ?>
        </p>
    </div>
    <div class="text-center mt-4">
        <p class="d-inline">Nom du correspondant :</p>
        <p class="d-inline">
            <?php echo $entreprises->nom_contact ?>
        </p>
    </div>
    <div class="text-center mt-4 mb-5">
        <p class="d-inline">Votre n° de SIRET :</p>
        <p class="d-inline">
            <?php echo $entreprises->n_de_siret ?>
        </p>
    </div>
    <div class="container text-center mt-5 p-5 border border-danger rounded">
        <h4>Accédez a votre tableau de bord pour gérer votre apparition et vos critères sur l'outil en ligne "1Expérience"</h4>
        <button class="mt-4 btn bg-danger"><a class="nav-link text-light" href="index.php?tbd">Tableau de bord</a></button>
    </div>
    <div class="form-group container mt-5">
        <h4 class="mt-3">Modifier les informations du profil</h4>
        <p class="mt-3">Certaine informations ne peuvent pas être modifier pour des raison de sécurité.
            comme l'adresse-mail et le muméros de siret.
        </p>
        <form method="POST">
            <label class="mt-3">Modifier le nom de l'entreprise</label>
            <input name="modifEntreprise" type="text" class="form-control mt-2" value="<?php echo $entreprises->nom_entreprise ?>" />
            <label class="mt-3">Modifier l'adresse de l'entreprise</label>
            <input name="modifAdresse" type="text" class="form-control mt-2" value="<?php echo $entreprises->adresse ?>"/>
            <label class="mt-3">Modifier la ville de l'entreprise</label>
            <input name="modifVille" type="text" class="form-control mt-2" value="<?php echo $entreprises->ville ?>"/>
            <label class="mt-3">Modifier le departement de l'entreprise</label>
            <input name="modifDepartement" type="text" class="form-control mt-2" value="<?php echo $entreprises->CodePostale ?>"/>
            <label class="mt-3">Modifier le nom du contact de l'entreprise</label>
            <input name="modifContacte" type="text" class="form-control mt-2 mb-3" value="<?php echo $entreprises->nom_contact ?>"/>
            <div class="form-group form-check mt-3 ">
                <input type="checkbox" name="oui" class="form-check-input" id="exampleCheck1">
                <p class="text-danger">Êtes-vous sur de vouloir modifier ces informations ?</p>
                <?php
                if(isset($formError['NotValidation'])){ ?>
                <small class="form-text  text-danger mt-5"><?= $formError['NotValidation'] ?></small>
                <?php } ?>
                <?php
                if(isset($formError['champsVide'])){ ?>
                <small class="form-text  text-danger"><?= $formError['champsVide'] ?></small>
                <?php } ?>
            </div>
            <button name="modifiateur" type="submit" class="btn btn-danger mt-4">Envoyer les modifications</button>
        </form>
    </div>
    <div class="container text-center border border-danger p-3 form-group mt-5">
        <h4>Supprimer le profil d'utilisateur du site internet "1Expérience"</h4>
            <button name="suppr1" type="button" class="mt-5 mb-4 btn btn-danger" data-toggle="modal" data-target="#exampleModal">SUPPRIMER LE COMPTE !</button>
        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le Compte</h5>
                    </div>
                    <form class="mt-5" method="POST">
                    <div class="modal-body">
                        Êtes-vous sur de vouloir supprimer votre compte, Vous ne pourrais plus vous connecter sur celui-ci ?
                        <label class="mt-5">Pour supprimer le profils, Ecrivez le mot "VALIDER" dans le champs prévu a cet effet ci-dessous</label>
                        <input class="form-control mt-4 mb-3" type="text" name="test">
                        <!-- Permet d'ajouter une etape de confirmation dans la procédure de supprimer son compte -->
                        <?php if(isset($formError['NotSuppr'])){ ?>
                        <small class="form-text  text-danger mt-5"><?= $formError['NotSuppr'] ?></small>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button name="suppr2" type="submit" class="btn btn-danger">SUPPRIMER</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

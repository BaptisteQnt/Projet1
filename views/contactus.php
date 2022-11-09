<div class="container">
    <h2 class="mt-5 mb-3">Pour nous contacter</h2>
    <p>Vous pouvez remplir ce petit formulaire ci dessous ou alors directement sur l'adress mail suivante
        <span>1Expérience.contact@outlook.com</span>Nous vous repondrons avec le plus de rapidité possible
    </p>
    <div class="text-center">
        <!-- Message de succes pour dire que le ticket d'aide a bien éte envoyé au support -->
        <?php
            if(isset($formSucces['bon'])){ ?>
                <small class="text-center text-success"><?=$formSucces['bon']?></small>
        <?php
            }
        ?>
    </div>
    <form method="POST" class="mt-3">
        <div class="form-group mt-3">
            <label for="exampleFormControlInput1">Votre Nom ? </label>
            <input type="text" class="form-control mt-3" name="nomcontact" placeholder="Nom ...">
        </div>
        <div class="form-group mt-3">
            <label for="exampleFormControlInput1">Votre Adresse Email </label>
            <input type="email" class="form-control mt-3" name="adressecontact" placeholder="AdresseMail@example.com">
        </div>
        <div class="form-group mt-3">
            <label for="exampleFormControlSelect1">Qui êtes-vous ?</label>
            <select class="form-control mt-3" name="statut" id="exampleFormControlSelect1">
            <option selected disabled>Votre status</option>
            <option>Un particulier</option>
            <option>Un stagiaire </option>
            <option>Une entreprise</option>
            <option>Un employer</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label class="mb-3" for="exampleFormControlTextarea1">Objet de votre demande</label>
            <textarea class="form-control" name="textdemande" rows="3" placeholder="Votre requête ..."></textarea>
        </div>
        <button name="envoyage" class="btn btn-danger mt-4" type="submit">Envoyer</button>
    </form>
    
</div>
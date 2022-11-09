<div class="container">
    <h2 class="mt-5 text-center">Votre tableau de bord</h2>
    
    <div class="d-flex mt-4 flex-column bd-highlight mb-3">
    <?php
    // Permet d'afficher un message de succes apres la modification des demande de l'entreprise
        if(isset($formSuccess['Suc'])){ ?>
            <small class="form-text text-center mt-4  text-success"><?= $formSuccess['Suc'] ?></small>
       <?php } ?>
        <form method="POST">
            <div class="p-2 mt-4 border rounded border-danger bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-25 flex-fill bd-highlight">Est-ce que vous prenez des stagiaire ?</div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="ouistage" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Oui
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="nonstage" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 mt-4 border rounded border-danger bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill w-25 bd-highlight">Est-ce que vous prenez des stagiaire qui sont mineur ? (-18ans)</div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="ouimineur" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Oui
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name='nonmineur'type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 mt-4 border border-danger rounded bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill w-25 bd-highlight">Est-ce que vous rechercher a pourvoire un poste au sein de votre entreprise ?</div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="ouiembauche" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Oui
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="nonembauche" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 mt-5 border rounded border-danger bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-50 flex-fill bd-highlight">Quel type de contrat pensez-vous pourvoir ?</div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="Aucun" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Aucun
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="CDI" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                CDI
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="CDD" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                CDD
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form-check">
                            <input class="form-check-input" name="Autre" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Apprentissage/Autres
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 ">
                <button type="submit" name="validation" class="btn btn-danger w-100 btn-lg btn-block">Sauvegarder</button>
            </div>
        </form>
        <div>
            <small id="formError"></small>
        </div>
    </div>
</div>
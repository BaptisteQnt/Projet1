<div class="container mt-5 mb-5">
    <h1 class="mt-5 mb-5">Votre compte a bien été supprimé.</h1>
    <p class="mt-5 mb-5">Nous sommes désolés que l'expérience "1Expérience" ne vous conviennent pas et vous souhaite une bonne continuation, l'équipe 1Expérience !</p>
    <button class="btn btn-danger"><a class="text-light text-decoration-none" href="index.php?home">Retournez sur la page principale</a></button>
    <h4 class="mt-5 mb-5">Vous allez être redirigé sur l'accueil automatiquement.</h4>
    <div class="mt-5 mb-5">
        <small class="text-secondary">Si la redirection ne marche pas vous pourrez toujours appuyer sur le nom du site dans la barre de navigation.</small>
    </div>
</div>
<script>
    document.addEventListener("onload",redirection1());
    function redirection1(){
        setTimeout(myURL1,10000)
    }
    function myURL1(){
        document.location.href = "http://localhost/projet1/index.php?home";
    }
</script>
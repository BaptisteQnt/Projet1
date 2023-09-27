<div class="modal" id="myModal1">
        <div class="modal-content">
            <span class="close" id="closeModal1">&times;</span>
            <h2>Projet de fin de formations</h2>
            <p class="mt-4">Voici mon projet réaliser afin de passer l'examen de fin de formation Développeur Web et Web Mobile
                <br/>Réaliser afin de correspondre au objectifs attendu pour l'obtention du titre professionnel
            </p>
            <div class="d-flex justify-content-around">
                <div>
                    <p>Langage : HTML / CSS / Javascript / PHP</p>
                    <p>Gestion de Donnée avec MySQL</p>
                    <p>Interaction avec des API : Leaflet / API AdresseGouv</p>
                </div>
                <div>
                    <p>Une partie Administrateur</p>
                    <p>Programmation Orienté Objet / POO</p>
                    <p>Index d'annonces</p>
                </div>
            </div>
            <div class="mt-3">
                <h3 class="mt-2">Contacter-moi afin d'exprimer vos critique sur le projet : Baptiste.qnt@gmail.com</h3>
                <p class="mt-3">N'hésiter pas a me faire un retour sur mon projet car je sais qu'il n'est pas parfait et avoir l'avis de développeur professionnelle est toujours constructifs afin d'ameliorer et apprendre mes connaissances</p>
            </div>
        </div>
    </div>
<div class="container">
    <h2 class="mt-5">Bienvenue sur cet outils en ligne pour faciliter votre recherche et l'accès à l'emploi</h2>
    <p class="mt-4">Pour beaucoup la première étape pour trouver un travail est de postuler pour un contrat en CDD/CDI/Alternance etc ...
        alors que le stage est un véritable outil pour espérer trouver un emploi. C'est alors pour ceci que nous avons créer cet outils pour permettre à vous d'augmenter votre chance de retourner a l'emploi, mais aussi de permettre au entreprise de facilité la recherche de personnel qualifié et d'augmenté leurs visibilité.
    </p>
</div>
<div class="container mt-5 d-flex bd-highlight">
    <div class="p-2 flex-fill bd-highlight mt-3 me-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold">Entreprise (Se Connecter)</h5>
                <p class="card-text">Connectez-vous pour gérer votre profil entreprise et affiner vos recherche de stagiaires !</p>
                <a href="index.php?connexion" class="btn btn-danger">Se Connecter</a>
            </div>
        </div>
    </div>
    <div class="p-2 flex-fill bd-highlight mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold">Votre entreprise désire participer et nous aider à atteindre l'objectifs mis en place par ce site !</h5>
                <p class="card-text">Alors inscrivez-vous et remplissez les critères que vous désirez pour pouvoir accepter les demandes d'immersion !</p>
                <a href="index.php?inscription" class="btn btn-danger">S'inscrire</a>
            </div>
        </div>
    </div>
    <!-- <div class="p-2 flex-fill bd-highlight">Flex item</div> -->
</div>
<div class="container mt-5" id="map" style="z-index: 0;"></div>
<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
            integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s="
            crossorigin="">
</script>
<script type="text/javascript">
            var map = L.map('map').setView([49.4295387, 2.0807123],13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            minZoom: 1,
            maxZoom: 19,
            }).addTo(map);

            L.marker([49.4295387, 2.0807123]).addTo(map)
            .bindPopup('Voici un exemple de marqueurs que vous retrouverez pour trouver les entreprise en recherche de stagiaire')
            .openPopup();

</script>

<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
<script>
const modal = document.getElementById("myModal1");
const closeModal = document.getElementById("closeModal1");

// Fonction pour afficher la fenêtre modale
function openModal() {
    modal.style.display = "block";
    console.log("it's ok");
}

// Fonction pour fermer la fenêtre modale
function closeModalWindow() {
    modal.style.display = "none";
}

// Écoutez l'événement de chargement de la page et affichez la fenêtre modale
window.addEventListener("load", openModal);

// Écoutez l'événement de clic sur le bouton de fermeture
closeModal.addEventListener("click", closeModalWindow);

console.log("It's OK !")</script>

        
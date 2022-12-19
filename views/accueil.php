<div class="container">
    <h2 class="mt-5">Bienvenue sur cette outils en ligne pour faciliter votre recherche et l'accès a l'emplois</h2>
    <p class="mt-4">Pour beaucoups la première étape pour trouver un trvail est de postuler pour un contart en CDD/CDI/Alternance etc ...
        alors que le stage est un véritable outils pour espérer trouver un emplois. C'est alors pour ceci que nous avons créer cet outils pour permettre à vous d'augmenter votre chance de retourner a l'emplois mais aussi, de permettre au entreprise de facilité la recherche de personnel qualifié et d'augmenté leurs visibilité.
    </p>
</div>
<div class="container mt-5 d-flex bd-highlight">
    <div class="p-2 flex-fill bd-highlight mt-3 me-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold">Entreprise (Se Connecter)</h5>
                <p class="card-text">Connectez-vous pour gérer votre profils entreprise et affiner vos recherche de stagiaires !</p>
                <a href="index.php?connexion" class="btn btn-danger">Se Connecter</a>
            </div>
        </div>
    </div>
    <div class="p-2 flex-fill bd-highlight mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold">Votre entreprise desire participer et nous aidez a atteindre l'objectifs mis en place par ce site !</h5>
                <p class="card-text">Alors inscrivez-vous et remplissez les critères que vous désirez pour pouvoir accepter les demande d'immersion !</p>
                <a href="index.php?inscription" class="btn btn-danger">S'inscrire</a>
            </div>
        </div>
    </div>
    <!-- <div class="p-2 flex-fill bd-highlight">Flex item</div> -->
</div>
<div class="container-fluid mt-5" id="map"></div>
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

        
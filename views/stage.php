<?php
$embauche = new Embauche();
$embauche->selectInfo(); 
?>
<div id="body"  class="container">
    <h2 class="text-center mt-5 mb-5" >Vous recherchez un stage en entreprise ?</h2>
    <div class="bd-highlight mt-5">
        <!-- Début de div avec l'api google maps -->
        <div class="p-2 flex-shrink-1 bd-highlight">
            <div id="map"></div>
        </div>
        <!-- Fin de div avec l'api google maps -->
    </div>
    <div class="container mt-5">
        <h4 class="mt-3 text-center">Nos conseils pour effectuer une recherche réussite !</h4>
        <p class="mt-5 text-center">
            Chercher à aller au maximum dans les locaux de l'entreprise si possible, afin de vous présenter et déposez votre lettre de motivations et un C.V. Vous aurez toujours plus de chance d'obtenir un stage en vous déplaçant.
        </p>
    </div>
    <div style="max-height: 85vh; background-color: #c8c8c8" class=" mt-5 overflow-scroll">
        <div class="d-flex justify-content-around mt-5 flex-wrap ">
        <!-- Permet d'afficher les entreprise qui ont confirmer dans leurs tableau de bord prendre des stage d'immersion -->
        <?php foreach ($info as $key => $afficher) { ?>
            <div class="card mb-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Nom entreprise : <?= $afficher->nom_entreprise ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Stage : <?= $afficher->stagiaire ?>, <br/>Stagiaire mineur : <?= $afficher->mineur ?></h6>
                    <p class="card-text">Possibilité de recrutement : <?= $afficher->embauche ?>, Nom du contrats : <?= $afficher->Nom_contrat ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
        <!-- Lien vers l'api -->
        <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
            integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s="
            crossorigin="">
        </script>
        <!-- Script qui consiste a mettre la carte sur paris via des coordonnes GPS -->
        <script type="text/javascript">
            var map = L.map('map').setView([48.856614, 2.3522219],13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            minZoom: 1,
            maxZoom: 19,
            }).addTo(map);

        </script>
        <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
            
        <script>
            var marks = <?php echo json_encode($marks); ?>;

            document.getElementById('body').addEventListener('onload', Marks(marks));
            
            // Fonction qui permet de créer des waypoint (Marqueur) sur la carte en fonction de l'adresse de l'entreprise
            function Marks(marks){
                var i = 0;
                for(i=0;i!= marks.length; i++){
                    
                    var coordLat = marks[i].adresse;
                    var coordLong = marks[i].CodePostale;
                    var coordName = marks[i].nom_entreprise;
                    var coordAdresse = marks[i].ville;
                    var coordStagiare = marks[i].stagiaire;


                    console.log(coordLat, coordLong, coordName, coordAdresse);

                    var marker = L.marker([coordLat,coordLong]).addTo(map);
                    marker.bindPopup("<b>"+coordName+"</b><br>"+coordAdresse+"<br>Prend des stagiaire: "+coordStagiare);7
                    
                }
            }
            
        </script>
        


                
            
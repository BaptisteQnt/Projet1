var geolocal = new XMLHttpRequest();



function geo(geolocal){
    var valeur3 = document.getElementById("valeur3").value;
    var valeur5 = document.getElementById("valeur5").value;

    console.log(valeur3, valeur5);
    
    var lat = null;
    var long = null;

    geolocal.open("GET","https://api-adresse.data.gouv.fr/search/?q="+valeur3+"&postcode="+valeur5, true);
    geolocal.send();

    geolocal.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var coordonnes = JSON .parse(this.responseText).features[0].geometry.coordinates;

            lat = coordonnes[1];
            long = coordonnes[0];

            if(lat!=null && long!=null){
                sendBase(geolocal, lat, long);
            }
        } else if (this.readyState == 400){
            alert("Une erreur est survenue");
        }
    };
}



function sendBase(geolocal, lat, long){
    var valeur1 = document.getElementById("valeur1").value;
    var valeur2 = document.getElementById("valeur2").value;
    var valeur4 = document.getElementById("valeur3").value + ', '+document.getElementById("valeur4").value;
    var valeur6 = document.getElementById("valeur6").value;
    var valeur7 = document.getElementById("valeur7").value;
    var valeur8 = document.getElementById("valeur8").value;
    var valeur = document.getElementById("valeur9").checked;
    var valeur9 = '';
    if (valeur == true) {
        valeur9 = 'patron'; 
        
    } else {
        valeur9 = 'employé'
    }
    console.log(valeur9);
    console.log(valeur1);
    console.log(valeur2);
    console.log(valeur4);
    console.log(valeur6);
    console.log(valeur7);
    console.log(valeur8);
    console.log(valeur9);
    var data = new FormData();

    geolocal.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var responses = JSON.parse(geolocal.response);
            console.log(responses);
            var formError = document.getElementById('formError');
            formError.innerHTML= responses.error
    
        } else if (this.readyState == 4){
            ("Une erreur est venue");
        }
    };
    
   

    
    geolocal.open("POST", "../Projet1/controllers/inscriptionCtrl.php", true);
    data.append("adresse", lat);
    data.append("CodePostale", long);
    data.append("namecompany", valeur1);
    data.append("siret", valeur2);
    data.append("ville", valeur4);
    data.append("email", valeur6);
    data.append("name", valeur7);
    data.append("mdp", valeur8);
    data.append("patron", valeur9);
    // console.log(data);
    geolocal.send(data);
    
    

}


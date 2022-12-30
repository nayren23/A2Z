var input = document.getElementById("image-input");
input.addEventListener("change", function() {
  var file = this.files[0];
  var reader = new FileReader();
  reader.addEventListener('load', onLoad);
  reader.readAsDataURL(file);
});

/**
 * 
 * @param {*} event 
 */
function onLoad(event){
    var imageData = event.target.result;
    const json = JSON.stringify(imageData); // transforme un objet JavaScript en string JSON.
    send(json)

}



/**
 * 
 * @param {*} json 
 */
function send(json){
    $.ajax({
        url: "./modules/mod_editionExo/modele_editionExo.php",
        type: "POST",
        data: { image: json },
        success: function(response) {
          console.log("Image envoyée avec succès!");
              //metrtre dans l'image dans le tab directeemtn par id par ex

        },
        error: function(response) {
            console.log("Erreur envoie image !"); // notif
          }
      });
}

function afficherImage(json){

}

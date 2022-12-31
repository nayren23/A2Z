/**
 * Fonction qui affiche la pop up de sélection de l'image
 */
async function importerImage() {

  const { value: file } = await Swal.fire({
    title: `Sélectionner l'image`,
    input: 'file',
    confirmButtonColor: '#0096d9',
    inputAttributes: {
      'accept': 'image/*',
      'aria-label': 'Upload your profile picture',

    }
  })

  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => onFileLoaded(e)
    reader.readAsDataURL(file)
  }
}


/**
 * Fonction qui stocke la photo
 * @param {*} event 
 */
function onFileLoaded(event) {
  // verifie la taille Mo
  Swal.fire({
    confirmButtonColor: '#0096d9',
    title: 'Votre photo téléchargée',
    imageUrl: event.target.result,
    imageAlt: 'Votre photo téléchargée'
  })
  var imageData = event.target.result;

  send(imageData)
}



/**
 * Fonction qui envoie la data reçu en paramètre, en base 64 à php
 * @param {*} imageData 
 */
function send(imageData) {
  $.ajax({
    url: "./modules/mod_editionExo/sauvegardePhoto.php",
    type: "POST",
    data: {
      image: imageData,

    },

    // traitement des cas 
    success: function (response) {
      setTimeout(affichageImportSuccess, 10000)//en millisecondes
    },
    error: function (response) {
      setTimeout(affichageImportErreur, 10000)//en millisecondes
    }
  });
}

function afficherImage() {

}


function affichageImportSuccess() {
  Toast.fire({
    icon: 'success',
    title: "Image sauvegardée avec succès😄"
  })
}


function affichageImportErreur() {
  Toast.fire({
    icon: 'error',
    title: "Erreur lors de l'envoi de l'image !🤔"
  })
}
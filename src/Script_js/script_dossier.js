async function popUpNomDuDossier($loc) {
  

  (async () => {

      const { value: nomDossier } = await Swal.fire({
        input: 'text',
        inputLabel: 'Entrez le nom du dossier',
        inputPlaceholder: 'Nom du dossier'
      })
      
      if (nomDossier) {
        Swal.fire('nom dossier : ', nomDossier)
        $.ajax ( {
          method : "POST" ,
          url : "./modules/mod_favoris/creerDossier.php",
          data : { dossier : nomDossier,
                  location : $loc  } ,
          dataType : "json"
          })
       
          .done ( function ( retour) {
            
            créarionIconedossier(retour,nomDossier)

          } ) ;
      }
      

        
      })()
}

function créarionIconedossier($idDossier,$nomDossier) {

let nouveauDossier = '<figure><a href="index.php?module=favoris&location=' + $idDossier + '"><img onClick="rechercheLocation()"src="./ressource/images/dossier.png" alt="Image de dossier"><figcaption>' + $nomDossier + '</figcaption></figure>';
$(".BoxDossiers").append(nouveauDossier);

}
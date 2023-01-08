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
            
            créationIconedossier(retour,nomDossier)

          } ) ;
      }
      

        
      })()
}

function créationIconedossier($idDossier,$nomDossier) {
let nouveauDossier = '<figure><a href="index.php?module=favoris&location=' + $idDossier + '"><img onClick="rechercheLocation()"src="./ressource/images/dossier.png" alt="Image de dossier"><figcaption>' + $nomDossier + '</figcaption></figure>';
$(".BoxDossiers").append(nouveauDossier);

}

function rechercheLocation() {

  var url = new URL(window.location.href);
  var idDossier = url.searchParams.get("location");
            $.ajax ( {
            method : "POST" ,
            url : "./modules/mod_favoris/creerDossier.php",
            data : { idDossier : idDossier,
                        } ,
            dataType : "json"
            })
            .done ( function ( element) {
              
              console.log(element)

              for (let i = 0 ; i < element.length; i++) {
              créationIconedossier(element[i]['idDossier'],element[i]['nomDossier']);
              }
            } ) ;
}

async function popUpNomDeLaFiche($loc) {
  

  (async () => {

      const { value: nomFiche } = await Swal.fire({
        input: 'text',
        inputLabel: 'Entrez le nom de la fiche',
        inputPlaceholder: 'Nom de la fiche'
      })
      
      if (nomFiche) {
        Swal.fire('nom fiche : ', nomFiche)
        $.ajax ( {
          method : "POST" ,
          url : "./modules/mod_editionExo/creerFiche.php",
          data : { nomFiche : nomFiche ,
            location : $loc } ,
          dataType : "json"
          })
       
          .done ( function ( retour) {
            
                créationIconeFiche($retour,)

          } ) ;
      }
      

        
      })()
}

function créationIconeFiche($idFiche,$nomFiche) {
  let nouvelElement = '<figure><a href="index.php?module=editionExo&idFiche=' + $idFiche + '"><img src="./ressource/images/imageFiche.png" alt="Image de dossier"><figcaption>' + $nomFiche + '</figcaption></figure>';
  $(".BoxDossiers").append(nouvelElement);
}
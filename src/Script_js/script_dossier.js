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
function supprimerDossier(idDossier) {
  $.ajax ( {
    method : "POST" ,
    url : "./modules/mod_favoris/creerDossier.php",
    data : { idDossier: idDossier } ,
    dataType : "json",



    success: function (response) {

    }
  })
}
function supprimerFiche(idFiche) {
  $.ajax ( {
    method : "POST" ,
    url : "./modules/mod_editionExo/creerFiche.php",
    data : { idFiche: idFiche,
                } ,
    dataType : "json"
    })
    .done ( function ( element) {
      console.log(element);

    } ) ;
}

function créationIconedossier($idDossier,$nomDossier) {
  let nouveauDossier = '<div class="imageSeule"><button type="button" class="boutonSupp" onClick="supprimerDossier('+ $idDossier +')">X</button> <figure><a href="index.php?module=favoris&location=' + $idDossier + '"><img onClick="rechercheLocation()"src="./ressource/images/dossier.png" alt="Image de dossier"><figcaption>' + $nomDossier + '</figcaption></figure></div>';
  $(".BoxDossiers").append(nouveauDossier);



}

function rechercheLocation() {

  var url = new URL(window.location.href);
  var location = url.searchParams.get("location");
  rechercheDossier(location);
  rechercheFiche(location);
}
function rechercheDossier (location) {
  $.ajax ( {
    method : "POST" ,
    url : "./modules/mod_favoris/creerDossier.php",
    data : { idParent: location,
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
function rechercheFiche (location) {
  $.ajax ( {
    method : "POST" ,
    url : "./modules/mod_editionExo/creerFiche.php",
    data : { idParent: location,
                } ,
    dataType : "json"
    })
    .done ( function ( element) {

      console.log(element)

      for (let i = 0 ; i < element.length; i++) {
      créationIconeFiche(element[i]['idFiche'],element[i]['nomFiche']);
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
        Swal.fire('nom fiche : ',nomFiche)
        $.ajax ( {
          method : "POST" ,
          url : "./modules/mod_editionExo/creerFiche.php",
          data : { nomFiche : nomFiche ,
            location : $loc } ,
          dataType : "json"
          })
       
          .done ( function ( retour) {

              console.log(retour)
              créationIconeFiche(retour,nomFiche);

          } ) ;
      }
      

        
      })()
}

function créationIconeFiche($idFiche,$nomFiche) {
  let nouvelElement = '<div class="imageSeule"><button type="button" class="boutonSupp" onClick="supprimerFiche('+ $idFiche +')">X</button> <figure><a href="index.php?module=editionExo&idFiche=' + $idFiche + '"><img src="./ressource/images/fiche.png" class="fiche"><figcaption>' + $nomFiche + '</figcaption></figure></div>'
  $(".BoxDossiers").append(nouvelElement);
}
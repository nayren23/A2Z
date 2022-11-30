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
              alert(" retour : " + retour );
              if ( retour == true) {
                $(".dossiers").append('<div class = "dossier"> <a href="index.php?module=favoris&location=' + retour + '"><figure><img onClick="rechercheLocation()"src="./ressource/images/dossier.png" alt="Image de dossier"><figcaption>"'+ nomDossier +'"</figcaption></figure></div>');

              } else {
                alert("problème avec la création du dossier")
              }

           10 } ) ;
        }
        

          
        })()
}

function rechercheLocation() {

  var url = new URL(window.location.href);
  var idDossier = url.searchParams.get("location");
            $.ajax ( {
            method : "POST" ,
            url : "./modules/mod_favoris/cont_favoris.php",
            data : { idDossier : idDossier  } ,
            dataType : "json"
            })
}

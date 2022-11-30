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
         
            .done ( function ( retour ) {
             console.log("ok")
            alert( " Reponse : " +retour ) ;
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

async function popUpNomDuDossier() {

    (async () => {

        const { value: nomDossier } = await Swal.fire({
          input: 'text',
          inputLabel: 'Entrez le nom du dossier',
          inputPlaceholder: 'Nom du dossier'
        })
        
        if (nomDossier) {
          Swal.fire('nom dossier : ', nomDossier)
        }
        $.ajax ( {
           method : "POST" ,
           url : "./modules/mod_favoris/creerDossier.php",
           data : { dossier : nomDossier  } ,
           dataType : "json"
           })
           
           .done ( function ( retour ) {
            console.log("ok")
           alert( " Reponse : " +retour ) ;
          10 } ) ;

          //header('Location: ./index.php?module=favoris&dossier=;'); //redirection vers la page 

          
        })()
}

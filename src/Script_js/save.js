function tojson() {
    //  This gives you an HTMLElement object
    var contentElements = document.querySelector('#formSave page').children; // recupere tous les elements enfants de celui recherche dans querySelector (selecteur CSS)
    let exercicesHTML = []
    Array.from(contentElements).forEach(element => exercicesHTML.push(element.outerHTML)); // transforme le HTMLCollection en tableau et ajoute chaque element dans le tableau exercicesHTML

    //  This gives you a string representing that element and its content
    //var html = element.outerHTML;
    //  This gives you a JSON object that you can send with jQuery.ajax's `data`
    // option, you can rename the property to whatever you want.
    var data = {
        html: exercicesHTML
    };

    //  This gives you a string in JSON syntax of the object above that you can 
    // send with XMLHttpRequest.
    const json = JSON.stringify(data); // transforme un objet JavaScript en string JSON.

    const obj = JSON.parse(json); // transforme un string JSON en objet JavaScript.



    console.log(obj);
    console.log(exercicesHTML[0]);







    $.ajax({
        method: "POST",
        url: "./modules/mod_editionExo/saveExo.php",
        data: { stringRecu: json },
        dataType: "json"
    })

}
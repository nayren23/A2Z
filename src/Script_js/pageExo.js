/*changement de la police*/
function changeAll(font) {
    var elements = document.getElementsByClassName('classeDeBase');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontFamily = font.value;

    }
}

function GetSelection() {
    var selection = "";

    var textarea = document.getElementById("myArea");
    console.log(textarea);
    var selection = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    console.log(selection);


}

function canvaAffiche() {





    var largeurCarreau = 20;
    var hauteurCarreau = 20;
    const longueurCanvas = $(".monCanvas").length;
    console.log($(".monCanvas")[0]);
    console.log($(".monCanvas"));
    console.log($(".monCanvas").length)
    for (let z = 0; z < longueurCanvas; z++) {

        var ctx = $(".monCanvas")[z].getContext('2d');
        for (var i = 0; i < 39; i++) {
            for (var j = 0; j < 3; j++) {
                ctx.fillStyle = "#ffffff";
                ctx.fillRect(i * largeurCarreau, j * hauteurCarreau, largeurCarreau, hauteurCarreau);
                ctx.strokeStyle = "#000000";
                ctx.strokeRect(i * largeurCarreau, j * hauteurCarreau, largeurCarreau, hauteurCarreau);
            }
        }

    }



}






$(function() {
    // page
    $(".sortable").sortable({
        revert: true
    });
    /*$(".draggable").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid"
    });*/
    // empêche la selection du texte des exos qu'on peut drag n drop sur la page
    $("li").disableSelection();
});


$(function() {
    // rend les exos draggable
    $(".draggable, #draggable-nonvalid").draggable({
            helper: "clone"
        })
        // rend la page droppable et definit l'event listener du drop
    $("#page").droppable({
        accept: ".draggable",
        drop: function(event, ui) { // drop ajoute lt-mirror et modifie les attribut du text area
            const classes = ui.draggable["0"].className
            let htmlNouvelExercice
            const uuid = CreateUUID()
            if (classes.includes("exoVraiFaux")) {
                htmlNouvelExercice = ` < div class = "divVraiOuFaux classeDeBase"
        id = "idDivVraiFaux" > < input type = "text"
        name = "VouF"
        id = "myArea"
        class = "inputVraiF all input-utilisateur" / > < button class = "supprimer"
        onClick = "supprimerExo(this)" > ❌ < /button> <p class="pVraiFaux">---------------Vrai----Faux</p > < /div>`
            } else if (classes.includes("exoVraiouFaux")) {
                htmlNouvelExercice = `<div class ="divVraiOuFaux classeDeBase" id="idDivVraiFaux"><input type="text" name="VouF" class="inputVraiF all input-utilisateur" /><button class = "supprimer" onClick="supprimerExo(this)">❌</button><p class="pVraiFaux">-----Vrai ou faux</p> </div>`
            } else if (classes.includes("consigne")) {
                htmlNouvelExercice = `<div class ="divVraiOuFaux classeDeBase" id="idDivVraiFaux"><input type="text" name="VouF" class="rond all input-utilisateur" maxlength="1"/><input type="text" name="VouF" class="consigne2 all input-utilisateur" /> <button class = "supprimer" onClick="supprimerExo(this)">❌</button> </div>`
            } else if (classes.includes("repondParPhrase")) {
                htmlNouvelExercice = `<div class ="divVraiOuFaux classeDeBase" id="idDivVraiFaux"><input type="text" name="VouF" class="inputCanva inputVraiF all input-utilisateur" /><button class = "supprimer" onClick="supprimerExo(this)">❌</button> <button class = "ajoutLigne" onClick="canvaAffiche()">+</button> <canvas class="monCanvas" width="740" height="61"></canvas></div>`


            }

            $(".res").append(htmlNouvelExercice);
            canvaAffiche();
            var idUnique = document.getElementById('idDivVraiFaux');
            idUnique.id = uuid
        }
    });
});


$(function() {
    canvaAffiche();

});


function CreateUUID() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    )
}


function getPDF() {
    window.print()
}
/*changement de la police*/
function changeAll(font) {
    var elements = document.getElementsByClassName('all');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontFamily = font.value;

    }
}


$(function() {
    $(".sortable").sortable({
        revert: true
    });
    $(".draggable").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid"
    });
    $("li").disableSelection();
});

/*

$(function() {  
    $(".dropp2").droppable();
    $(".dragg").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid",

        drag: function(event, ui) {

            $(".res") += ('<div id = "divTest"> <span class="accordion-heading all" id="myElement">Mise en page test </span><p> je suis le plus BG</p>  </div>');


        }

    });

});

*/





$(function() {
    $("#draggable, #draggable-nonvalid").draggable({
            helper: "clone"
        }),
        $("#page").droppable({

            accept: "#draggable",
            drop: function(event, ui) {

                $(".res").append('<div class = "divTest" > <textarea name="VouF" class="inputVraiF all"  ></textarea> <p class="pVraiFaux">---------------Vrai----Faux</p> </div>');

            }
        });
});










function getPDF() {
    var doc = new jsPDF();

    // We'll make our own renderer to skip this editor
    var specialElementHandlers = {
        '#getPDF': function(element, renderer) {
            return true;
        },

    };

    // All units are in the set measurement for the document
    // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
    doc.fromHTML($('.zima').get(0), 15, 15, {
        'width': 170,
        'height': 200,
        'elementHandlers': specialElementHandlers
    });

    doc.save('Generated.pdf');
}
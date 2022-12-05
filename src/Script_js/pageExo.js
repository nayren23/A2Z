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






$(function() {
    $("#draggable, #draggable-nonvalid").draggable({
            helper: "clone"
        }),
        $("#page").droppable({

            accept: "#draggable",
            drop: function(event, ui) {

                $(".res").append('<div class ="divVraiOuFaux" id="idDivVraiFaux"> <textarea name="VouF" class="inputVraiF all"  ></textarea> <p class="pVraiFaux">---------------Vrai----Faux</p> </div>');

                //$("#idDivVraiFaux").text("" + CreateUUID());



            }
        });
});


function CreateUUID() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    )
}







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
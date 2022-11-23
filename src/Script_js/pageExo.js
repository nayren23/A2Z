/*changement de la police*/
function changeAll(font) {
    var elements = document.getElementsByClassName('all');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontFamily = font.value;

    }
}


$(function () {
    $(".sortable").sortable({
        revert: true
    });
    $(".draggable").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid"
    });
    $("ul, li").disableSelection();
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





$(function () {
    $("#draggable, #draggable-nonvalid").draggable({
        helper: "clone"
    }),
        $("#page").droppable({

            accept: "#draggable",
            drop: function (event, ui) {

                $(".res").append('<div class = "divTest"> <textarea name="VouF" class="inputVraiF all"  ></textarea> <p class="pVraiFaux">---------------Vrai----Faux</p> </div>');




                var divT = document.getElementsByClassName('divTest');

                for (var i = 0; i < divT.length; i++) {
                    var element = divT[i];
                    element.style.border = " solid grey";

                }




                var divT = document.getElementsByClassName('pVraiFaux');

                for (var i = 0; i < divT.length; i++) {
                    var elementp = divT[i];
                    elementp.style.border = " solid grey";
                    elementp.style.cssFloat = "right";
                    elementp.style.marginTop = "revert";
                    elementp.style.marginbottom = "0px";
                    elementp.style.color = "black";







                }


                var inputVraiF = document.getElementsByClassName('inputVraiF');

                for (var i = 0; i < inputVraiF.length; i++) {
                    var element2 = inputVraiF[i];
                    element2.style.height = "50px";
                    element2.style.width = "470px";

                    element2.style.resize = "none";



                }


            }
        });
});


function getPDF() {
    var doc = new jsPDF();

    // We'll make our own renderer to skip this editor
    var specialElementHandlers = {
        '#getPDF': function (element, renderer) {
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


function tojson() {
    //  This gives you an HTMLElement object
var element = document.getElementById('formSave');
//  This gives you a string representing that element and its content
var html = element.outerHTML;       
//  This gives you a JSON object that you can send with jQuery.ajax's `data`
// option, you can rename the property to whatever you want.
var data = { html: html }; 

//  This gives you a string in JSON syntax of the object above that you can 
// send with XMLHttpRequest.
var json = JSON.stringify(data);

console.log(json);
}


var isCtrl = false;
document.onkeyup = function (e) {
    if (e.keyCode == 17) isCtrl = false;
}

document.onkeydown = function (e) {
    if (e.keyCode == 17) isCtrl = true;
    if (e.keyCode == 83 && isCtrl == true) {
        //run code for CTRL+S -- ie, save!

        $("#button").append(' <span class="save-icon"><span class="loader"></span><span class="loader"></span><span class="loader">');

       
        console.log("Ctrl+S pressed");
        return false;
    }
}
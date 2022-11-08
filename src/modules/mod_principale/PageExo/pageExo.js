
function changeStyle() {
    var element = document.getElementById("myElement");
    element.style.fontFamily = "arial";
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



$(function () {
    $(".dropp2").droppable();
    $(".dragg").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid",
        
        drag: function (event, ui) {
            $(".res").html("<b>Draggable Drag.</b><br><p> salut je suis moi </p> ");
        }
        
    });
    

});

function ajoutHtml(){
    let b = document.getElementById("page");
    let newP = document.createElement("p");
    let newTexte = document.createTextNode("Ceci est un nouveau paragraphe");
 
    newP.textContent = "Ceci est un nouveau paragraphe";
 
     b.append(newTexte);
     b.prepend(newP);
     b.appendChild(newP);
 }


function changeFont() {
    var elements = document.getElementsByClassName('font');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontFamily = "cursive";

    }
}





function changeBold() {
    var elements = document.getElementsByClassName('bold');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontWeight = "bolder";

    }
}





function changeNormal() {
    var elements = document.getElementsByClassName('normal');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontWeight = "normal";

    }
}

function changeAll(font) {
    var elements = document.getElementsByClassName('all');

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.style.fontFamily = font.value;

    }
}


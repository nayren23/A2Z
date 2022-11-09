

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



$(function () {
    $(".dropp2").droppable();
    $(".dragg").draggable({
        connectToSortable: ".sortable",
        helper: "clone",
        revert: "invalid",
        
        drag: function (event, ui) {
           
            $(".res").append('<span class="accordion-heading all" id="myElement">Mise en page</span>');
            
    
        }
        
    });

});










$( function() {
    $( "#draggable, #draggable-nonvalid" ).draggable();
    $( "#droppable" ).droppable({
      accept: "#draggable",
      classes: {
        "ui-droppable-active": "ui-state-active",
        "ui-droppable-hover": "ui-state-hover"
      },
      drop: function( event, ui ) {
        $( this )
          .addClass( "ui-state-highlight" )

            $(".res").append('<span class="accordion-heading all" id="myElement">Mise en page</span>');

      }
    });
  } );

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

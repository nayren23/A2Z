<?php

require_once "./Common/Classe_Generique/vue_generique.php";

class VueFavoris extends Vue_Generique {

  public function  __construct()
  {
    parent::__construct();  // comme un super
  }

  
  public function carouselFiches() {
  ?>

    <link type="text/css" rel="stylesheet" href="css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/lightslider.js">    // Do not include both lightslider.js and lightslider.min.js </script>


    <ul id="lightSlider">
      <li>
          <h3>First Slide</h3>
          <p>Lorem ipsum Cupidatat quis pariatur anim.</p>
      </li>
      <li>
          <h3>Second Slide</h3>
          <p>Lorem ipsum Excepteur amet adipisicing fugiat velit nisi.</p>
      </li>
    </ul>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#lightSlider").lightSlider(); 
      });
    </script>


    <script type="text/javascript"> // Settings
    $(document).ready(function() {
        $("#lightSlider").lightSlider({
            item: 3,
            autoWidth: false,
            slideMove: 1, // slidemove will be 1 if loop is true
            slideMargin: 10,
     
            addClass: '',
            mode: "slide",
            useCSS: true,
            cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
            easing: 'linear', //'for jquery animation',////
     
            speed: 400, //ms'
            auto: false,
            loop: false,
            slideEndAnimation: true,
            pause: 2000,
     
            keyPress: false,
            controls: true,
            prevHtml: '',
            nextHtml: '',
     
            rtl:false,
            adaptiveHeight:false,
     
            vertical:false,
            verticalHeight:500,
            vThumbWidth:100,
     
            thumbItem:10,
            pager: true,
            gallery: false,
            galleryMargin: 5,
            thumbMargin: 5,
            currentPagerPosition: 'middle',
     
            enableTouch:true,
            enableDrag:true,
            freeMove:true,
            swipeThreshold: 40,
     
            responsive : [],
     
            onBeforeStart: function (el) {},
            onSliderLoad: function (el) {},
            onBeforeSlide: function (el) {},
            onAfterSlide: function (el) {},
            onBeforeNextSlide: function (el) {},
            onBeforePrevSlide: function (el) {}
        });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        var slider = $("#lightSlider").lightSlider();
        slider.goToSlide(3);
        slider.goToPrevSlide();
        slider.goToNextSlide();
        slider.getCurrentSlideCount();
        slider.refresh();
        slider.play(); 
        slider.pause();    
      });
    </script>
<?php
  }

  public function boutonCreerDossier() {
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./Script_js/script_dossier.js">
</script>
   <button type="button" onClick="popUpNomDuDossier(<?php echo $_GET['location']?>)" name="CreerDossier" > Créer un dossier </button>
<?php
  
  }

    public function affichageDossier() {
?>
  <script src="./Script_js/script_dossier.js"></script>
  <div classname="dossiers">
        <p> eiuthreaik</p>
  </div>

<?php
    }
  


}

?>
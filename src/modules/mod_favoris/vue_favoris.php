<?php

require_once "./Common/Classe_Generique/vue_generique.php";

class VueFavoris extends Vue_Generique {

  public function  __construct()
  {
    parent::__construct();  // comme un super
  }

  
  public function carouselFiches() {
  
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
<link rel="stylesheet" href="./Style_css/dossier.css" />
  <script src="./Script_js/script_dossier.js"></script>
  <div class="BoxDossiers">
  </div>

<?php
    }
  


}

?>
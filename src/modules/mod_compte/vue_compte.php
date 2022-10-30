<?php
require_once "./vue_generique.php";

class VueCompte extends Vue_Generique
{

  public function  __construct()
  {
    parent::__construct(); // comme un super
  }

  ////////////////////////////////////////////////// Modifiaction Identifiant ///////////////////////////////////////////////////////
  // formulaire pour la modification de compte
  public function form_modification_compte_identifiant()
  {

?>

    <head>
      <link rel="stylesheet" href="Style_css/pageConnexion.css">
    </head>

    <body>
      <div class="contenir">
        <?php
        ?>
        <form action="index.php?module=compte&action=changementIdentifiant" method="post">
          <p>Changement de l'identifiant</p>
          <div> <input class="saisieText" type="text" placeholder="Nouvel Identifiant" name="nouveauidentifiant" required></div>
          <div><input class="saisieText" type="submit" value="Sauvegarder mes informations !"> </div>
        </form>
        <?php
        ?>
      </div>
    </body>
  <?php

  }

  // formulaire pour la modification de compte
  public function form_modification_compte_adressemail()
  {
  ?>

    <head>
      <link rel="stylesheet" href="Style_css/pageConnexion.css">
    </head>

    <body>
      <div class="contenir">
        <?php
        ?>
        <form action="index.php?module=compte&action=changementAdresseMail" method="post">
          <p>Changement de l'adresse mail</p>
          <div> <input class="saisieText" type="email" placeholder="Nouvel adresse mail" name="nouveladresseMail" required></div>
          <div><input class="saisieText" type="submit" value="Sauvegarder mes informations !"> </div>
        </form>
        <?php
        ?>
      </div>
    </body>
  <?php

  }

  // formulaire pour la modification de compte
  public function form_modification_compte_mot_de_passe()
  {

  ?>

    <head>
      <link rel="stylesheet" href="Style_css/pageConnexion.css">
      <script src="modules/mod_connexion/outilsMotDePasse.js"></script>
    </head>

    <body>
      <div class="contenir">
        <?php
        ?>
        <form action="index.php?module=compte&action=changementMotDePasse" method="post">
          <p>Changement de l'adresse mail</p>
          <div class="boutonMdp">
            <input class="saisieText" type="password" id="monEntree" placeholder="Nouvel mot de passe" name="nouveauMotDePasse" required>
            <button type="button" class="checkboxMdp"> <img id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse()"> </button>
          </div>
          <div><input class="saisieText" type="submit" value="Sauvegarder mes informations !"> </div>
        </form>
        <?php
        ?>
      </div>
    </body>
  <?php
  }


  public function affichageInfoCompte()
  {

  ?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset='utf-8'>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>




  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Informations générales</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Photo</strong>
          <a href="#">Modifier </a>
        </div>
        <span class="d-block">Personnalisez votre compte en ajoutant une photo</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Identifiant</strong>
          <a href="#">Modifier</a>
        </div>
        <span class="d-block">Personnalisez votre nom d'utilisateur</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Mot de passe</strong>
          <a href="#">Modifier</a>
        </div>
        <span class="d-block">Personnalisez votre mot de passe</span>
      </div>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>

    </body>

    </html>

  <?php
  }
  ////////////////////////////////////////////////////TOAST////////////////////////
  //fonction pour l'affichage du toast "pop up" pour afficher un message de bienvenu
  public function popUpClassique($Titre, $Contenu)
  {

  ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!DOCTYPE html>
    <html>

    <head>
      <meta charset='utf-8'>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <body>
      <div class="index">

        <div class="container">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4> <?php echo $Titre; ?> </h4>
            <?php echo $Contenu;  ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
        </div>
      </div>

    </body>

    </html>

<?php
  }
}

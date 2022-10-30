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
      <script src="modules/mod_connexion/outilsMotDePasse.js"></script>
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
        <script src="modules/mod_connexion/outilsMotDePasse.js"></script>
      </head>
  
      <body>
  
        <div class="contenir">
  
          <?php
  
  
          ?>
            <form action="index.php?module=compte&action=changementAdresseMail" method="post">
              <p>Changement de l'adresse mail</p>
  
  
              <div> <input class="saisieText" type="text" placeholder="Nouvel adresse mail" name="nouveladresseMail" required></div>
  
              <div><input class="saisieText" type="submit" value="Sauvegarder mes informations !"> </div>
            </form>
          <?php
          
  
          ?>
        </div>
      </body>
  
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

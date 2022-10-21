<?php

class VueConnexion
{

  public function  __construct() // constructeur c'est la methode construct
  {
     // parent::__construct();// comme un super
  }

  public function menu()
  {
    
    
    echo "  <a href=\"index.php?module=connexion&action=inscription\">Inscription</a> </br> ";
    echo "  <a href=\"index.php?module=connexion&action=connexion\">Connexion</a> </br>";
    echo "  <a href=\"index.php?module=connexion&action=deconnexion\">Deconnexion</a> </br>";

  }

  public function form_inscription()
  {
    //index.php?module=joueurs&action=ajout


    ?>

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Style_css/pageAcceuil.css">

  </head>

    <body>


        
    <header class ="headerconnexion" >
      <div class="p-3 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white">Contact </a></li>
            <li><a href="#" class="nav-link px-2 text-white">Respect de la vie privée</a></li>
            <li><a href="#" class="nav-link px-2 text-white">A propos de</a></li>
          </ul>



          <div class="text-end">
            <button type="button" class="btn btn-outline-light me-2">Connexion</button>
            <button type="button" class="btn btn-warning">Inscription</button>
          </div>
        </div>
      </div>
      </div>
  </header>
    <div class="contenir">


    <form action="index.php?module=connexion&action=creationCompte" method="post">
    <p>Inscription</p>

        <div>
          <input type="text" placeholder="Identifiant" name="identifiant" required>
        </div>
        
        <div >
          <input type="text" placeholder="Mot de passe" name="motDePasse"required>
        </div>

        <div >
        <input type="text" placeholder="E-mail" name="adresseMail"required>
      </div>
      <input type="submit" value="Inscription!">

        <div>


        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
        
    </div>
    </body>

<?php
    
  }

  public function inscription()
  {
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<!DOCTYPE html>
<html>
  <head>
    <title>A2Z </title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    
  <div class="container">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <h4>Inscription Réussite !!! 😍</h4>
        
      Bonjour 
      <?php echo$_POST['identifiant']; ?>  
      et bienvenue sur A2Z la plateforme intuitive pour créer sa fiche d'exercice 😄!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
      </div>
    </div>  

  </body>
</html>



<?php

  }
  public function form_connexion()
  {
    ?>
    <head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Style_css/pageAcceuil.css">
  
  </head>

    <body>


    <header class ="headerconnexion" >
      <div class="p-3 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white">Contact </a></li>
            <li><a href="#" class="nav-link px-2 text-white">Respect de la vie privée</a></li>
            <li><a href="#" class="nav-link px-2 text-white">A propos de</a></li>
          </ul>



          <div class="text-end">
          <button type="button" class="btn btn-warning">Inscription</button>
          <button type="button" class="btn btn-outline-light me-2">Connexion</button>
          <button type="button" class="btn btn-outline-light me-2">Déconnexion</button>
          </div>
        </div>
      </div>
      </div>
  </header>

    <div class="contenir">

      <form action="index.php?module=connexion&action=connexionidentifiant" method="post">
        <p>Bienvenue</p>

        <div>
          <input type="text" placeholder="Identifiant" name="identifiant" required>
        </div>
        <div >
          <input type="text" placeholder="Mot de passe" name="motDePasse"required>
        </div>
        <div>
          <input type="submit" value="Connexion!">
        </div>
          <a href="#">Mot de passe oublié</a>
       </form>

        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
    </div>
    </body>

   <?php
}

  public function deconnexion()
  {

      ?>
    
  
  
  
  <!DOCTYPE html>
  <html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
      <title>A2Z </title>
      <meta charset='utf-8'>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
      
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4>Déconnexion Réussite !!! 😰</h4>
          
        Au revoir 
        <?php echo$_POST['identifiant']; ?>  
        Au revoir   et a bientôt  sur A2Z la plateforme intuitive pour créer sa fiche d'exercice 🥰!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
      </div>  
  
    </body>
  </html>
  <?php
    }
}

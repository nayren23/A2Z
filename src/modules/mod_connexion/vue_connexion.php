<?php
require_once "./vue_generique.php";

class VueConnexion extends Vue_Generique
{

  public function  __construct()
  {
    parent::__construct(); // comme un super
  }


  ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////
  // formulaire d'inscription au site 
  public function form_inscription()
  {
    //index.php?module=joueurs&action=ajout


?>
    <title> INSCRIPTION | A2Z</title>
    <div class="pageCompte">
      <div class="contenir">
        <div class="auth-title">
          <h1>INSCRIPTION</h1>
          <p>Inscrivez-vous à A2Z</p>
        </div>
        <?php
        if (!isset($_SESSION["identifiant"])) { // pour afficher le formulaire uniquement si on n'est pas déjà connecter

        ?>
          <form action="index.php?module=connexion&action=creationCompte" method="post">
            <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
            <!--Token- -->

            <div> <input class="saisieText" type="text" placeholder="Identifiant" name="identifiant" required maxlength="50"></div>

            <!--Premier Mot de Passe- -->
            <div class="boutonMdp">
              <input class="saisieText" id="premierMdp" type="password" placeholder="Mot de passe" name="motDePasse" required maxlength="100">
              <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(premierMdp,oeil)"> </button>
            </div>

            <!--Deuxième Mot de Passe- -->
            <div class="boutonMdp">
              <input class="saisieText" id="deuxiemeMdp" type="password" placeholder="Confirmation Mdp" name="DeuxiemeMotDePasse" required maxlength="100" onKeyUp="checkMdp()">
              <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="deuxiemeOeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(deuxiemeMdp,deuxiemeOeil)"> </button>
            </div>
            <div><input class="saisieText" type="email" placeholder="E-mail" name="adresseMail" required maxlength="75"></div>
            <div><input class="saisieText" type="submit" value="S'inscrire 👋🏻 !"> </div>
            <div id="deuxiemeAffichageMdp">
              <!--Vide pour laisser la place au message d'erreur  -->
            </div>
            <p>&copy;A2Z 2022</p>
          </form>
        <?php
        } else {
          $this->compteInexsistant();
        }

        ?>
      </div>
    </div>
  <?php

  }

  ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////

  //fonction pour afficher le foirmulaire de connexion
  public function form_connexion()
  {
  ?>
    <title> CONNEXION | A2Z</title>
    <?php
    if (!isset($_SESSION["identifiant"])) {
    ?>
      <div class="pageCompte">
        <div>
          <div class="auth-title">
            <h1>Connexion</h1>
            <p>Connectez-vous à A2Z</p>
          </div>
          <form action="index.php?module=connexion&action=connexionidentifiant" method="post">
            <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
            <!--Token- -->

            <br>
            <br>
            <br>
            <div><input class="saisieText" type="text" placeholder="Identifiant" name="identifiant" required maxlength="50"></div>

            <div class="boutonMdp">
              <input class="saisieText" type="password" id="monEntree" placeholder="Mot de passe" name="motDePasse" required maxlength="100">
              <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(monEntree,oeil)"> </button>
            </div>

            <div><input class="saisieText" type="submit" value="Se connecter 🤩 !"></div>
            <a href="#">Mot de passe oublié</a>
            <p>&copy;A2Z 2022</p>

          </form>
        </div>
      </div>
    <?php
    } else {
      $this->compteInexsistant();
    }
    ?>
  <?php
  }

  //fonction pour l'affichage du toast "pop up" pour afficher un message d'erruer si un compte est Inexsistant '
  public function compteInexsistant()
  {
    if (isset($_SESSION['identifiant'])) {
      $this->affichageDejaConnecter();
    } else {
      $this->affichagCompteInexistant();
    }
  }

  public function affichageAdreMailUtiliser()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'error',
        title: "Attention cette adresse mail <br>ou cet identifiant existe déjà 😮 "
      })
    </script>

  <?php
  }

  public function affichageDeconnexion()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'info',
        title: "Au revoir et a bientôt sur A2Z la plateforme <br>intuitive pour créer sa fiche d'exercice 🤩! "
      })
    </script>

  <?php
  }

  /// mettre cette fonction dans mod principale
  public function affichageConnexionReussie()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'success',
        title: "Heureux de vous revoir  sur A2Z la plateforme intuitive pour créer sa fiche d' exercice 🥰! "
      })
    </script>

  <?php
  }

  public function affichageInscriptionReussite()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'success',
        title: "Inscription Réussite <br>Bonjour et bienvenue sur A2Z la plateforme intuitive pour créer sa fiche d'exercice 😄! "
      })
    </script>

  <?php
  }

  public function affichageDeconnexionImpossible()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'error',
        title: "Vous devez d'abord vous connecter pour faire la déconnexion 😮!!! "

      })
    </script>

  <?php
  }

  public function affichageDejaConnecter()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'error',
        title: " Vous êtes déjà connecté, veuillez d'abord vous déconnecter 😮 !!!"
      })
    </script>
  <?php
  }

  public function affichagCompteInexistant()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'error',
        title: "Attention  ce compte n'existe pas 😥!!! "
      })
    </script>

<?php
  }
}

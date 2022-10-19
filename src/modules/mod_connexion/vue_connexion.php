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

    echo '<form action="index.php?module=connexion&action=creationCompte" method="post">
        <div>
          <label for="nom">Entrer votre identifiant: </label>
          <input type="text" name="identifiant" required>
        </div>
        
        <div >
          <label for="motDePasse">Entrer votre mot de passe: </label>
          <input type="text" name="motDePasse"required>
        </div>
        <div>

        <div>
        <label for="adresseMail">Entrer votre adresseMail: </label>
        <input type="email" name="adresseMail" required>
        </div>

          <input type="submit" value="Inscription!">
        </div>
      </form>
      ';
  }

  public function form_connexion()
  {
    //index.php?module=joueurs&action=ajout

    echo '<form action="index.php?module=connexion&action=connexionidentifiant" method="post">
        <div>
          <label for="nom">Entrer votre identifiant: </label>
          <input type="text" name="identifiant" required>
        </div>
        <div >
          <label for="motDePasse">Entrer votre mot de passe: </label>
          <input type="text" name="motDePasse"required>
        </div>
        <div>
          <input type="submit" value="Connexion!">
        </div>
      </form>
      ';
  }

  public function deconnexion()
  {
    echo '<input class="favorite styled" type="button"  value="Deconnexion">';
  }
}

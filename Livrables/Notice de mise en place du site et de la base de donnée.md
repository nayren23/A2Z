##  Notice de mise en place du site et de la base de donnée
### Prérequis

* PHP >= 7.4
* MySQL >= 5.7
* Git

### Installation
Veillez à avoir installé Git sur votre machine sinon, suivez ce tuto: https://www.youtube.com/watch?v=mNwPztLFFJo
Vous pouvez aussi télécharger le fichier source depuis GitHub  et le dézipper  et le mettre dans -->

##### Exécutez les commandes ci-dessous
```
cd {REPERTOIRE_APACHE} par exemple pour Wamp : C:\wamp64\www
git clone https://github.com/DUT-Info-Montreuil/A2Z.git

Puis lancer les services MySQL et Apache
Allez dans son navigateur et dans : http://localhost/phpmyadmin/index.php

Useur : root et appuyer sur entrée

Créer DATABASE a2z;
Créer USER 'a2z'@'localhost' IDENTIFIED BY 'PASSWORD'; 
GRANT ALL PRIVILEGES ON a2z.* TO 'a2z'@'localhost';
FLUSH PRIVILEGES;

```
###### Changez les identifiants de connexion.php
```php
<?php
class Connexion
{
    protected static $bdd;

    //Initialise base de donnée
    public static function initConnexion()
    {
        $id = "a2z";
        $dbname = "a2z";
        $mdp = "VOTREMOTDEPASSE";
        $adress = "localhost";

        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }
}
?>
```
### Accées au site

Pour accéder au site, vous pouvez utiliser ce lien :
http://localhost/A2Z/src/index.php?

Version 1.0 - 2022/11/30
GNU GPL  Copyleft (C inversé) 2023-2033
Initiated by Hamidi.Yassine,Chouchane.Rayan,Claude.Aldric
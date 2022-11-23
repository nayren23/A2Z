<?php
require_once "./vue_generique.php";

class VueConnexion_gestion_Useur extends Vue_Generique
{

  public function  __construct()
  {
    parent::__construct(); // comme un super
  }

  ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////

  //fonction pour afficher le foirmulaire de connexion
  public function form_connexion_gestion_Useur()
  {
?>
    <title>Gestion Useur | A2Z</title>
    <?php
    ?>
    <div class="pageCompte">
      <div>
        <div class="auth-title">
          <h1>Administration</h1>
          <p>Connexion admin A2Z</p>
        </div>
        <form class="formulairegenerale" action="index.php?module=administration&action=connexionidentifiant" method="post">
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

    ?>
  <?php
  }
  //affichage de la liste des utilisateurs
  public function affichageListeUseur($resultat)
  {

  ?>
    <title>Liste Useur | A2Z</title>


    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-archive text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1">24</h5>
              <p class="text-muted mb-0">Total des comptes</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-th text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1">18</h5>
              <p class="text-muted mb-0">Total des Utlisateurs</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-file text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1">06</h5>
              <p class="text-muted mb-0">Total des Administrateurs</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-group mb-0">
                  <label>Rechercher</label>
                  <div class="input-group mb-0">
                    <input type="text" class="form-control" placeholder="Rechercher..." aria-describedby="project-search-addon" />
                    <div class="input-group-append">
                      <button class="btn btn-danger" type="button" id="project-search-addon"><i class="fa fa-search search-icon font-12"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive project-list">
                <table class="table project-table table-centered table-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Id Utilisateur</th>
                      <th scope="col">Adresse Mail</th>
                      <th scope="col">Identifiant</th>
                      <th scope="col">Photo</th>
                      <th scope="col">id Groupes</th>
                      <th scope="col">Mot de Passe</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($resultat as $value) { //boucle pour afficher les valeur du tableau contenat les info des useurs
                    ?>
                      <tr>
                        <td><?php echo $value['idUser'] ?></td>
                        <!--Id Utilisateur -->
                        <td><?php echo $value['adresseMail'] ?></td>
                        <td>
                          <span class="text-success font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo $value['identifiant'] ?></span>
                        </td>
                        <td>
                          <div class="team">
                            <a href="javascript: void(0);" class="team-member" data-toggle="tooltip" data-placement="top" title="" data-original-title="Roger Drake">
                              <img alt="photo de profile" src="<?php echo $value['cheminImage'] ?>" class="rounded-circle avatar-xs" alt="" />
                            </a>
                          </div>
                        </td>
                        <td><?php echo $value['idGroupes'] ?></td>
                        <!--Id Utilisateur -->
                        <td>****************</td>
                        <!--Id Utilisateur -->


                        <td>
                          <div class="action">
                            <a href="#" class="text-success mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil h5 m-0"></i></a>
                            <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
              <!-- end project-list -->

              <div class="pt-3">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>

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

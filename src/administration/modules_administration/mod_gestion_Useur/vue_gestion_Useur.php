<?php
require_once "./Common/Classe_Generique/vue_generique.php";

require_once("./Common/Classe_Generique/vue_connexion_generique.php");
class VueConnexion_gestion_Useur extends Vue_connexion_generique
{


  //affichage de la liste des utilisateurs
  public function affichageListeUseur($resultat, $nbr_de_pages)
  {

?>
    <title>Tableau de Bord | A2Z</title>
    <div class="container">

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
                      <th scope="col">Rôle</th>
                      <th scope="col">Mot de Passe</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    // ---------------------- boucle pour afficher les valeur du tableau contenat les info des useurs---------------------- 
                    foreach ($resultat as $value) {
                    ?>
                      <tr>
                        <td><?php echo $value['idUser'] ?></td>
                        <!--Id Utilisateur -->
                        <td><?php echo $value['adresseMail'] ?></td>
                        <td>
                          <span class="font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo $value['identifiant'] ?></span>
                        </td>
                        <td>
                          <div class="team">
                            <a href="javascript: void(0);" class="team-member" data-toggle="tooltip" data-placement="top" title="" data-original-title="Roger Drake">
                              <img alt="photo de profile" src="<?php echo $value['cheminImage'] ?>" class="rounded-circle avatar-xs" alt="" />
                            </a>
                          </div>
                        </td>
                        <td><?php if ($value['idGroupes'] == 1) {
                            ?> <span class="text-success font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo "Professeur"; ?></span>
                          <?php
                            } else {
                          ?>
                            <span class="text-admin font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo "Admin"; ?></span>
                          <?php
                            } ?>
                        </td>
                        <!--Id Utilisateur -->
                        <td>****************</td>
                        <!--Id Utilisateur -->
                        <td>
                          <div class="action">
                            <!--Bouton Modifiaction -->
                            <a id='<?php echo $value['idUser']  ?>' href='index.php?module=gestionUseur&action=affichageInfoUseur&idUseur=<?php echo $value['idUser'] ?>' class="text-success mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil h5 m-0"></i></a>
                            <!--Bouton Suppresion -->
                            <a id='<?php echo $value['idUser']  ?>' href='index.php?module=gestionUseur&action=suppresionUseur&idUseur=<?php echo $value['idUser'] ?>' class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    // ---------------- FIN boucle pour afficher les valeur du tableau contenat les info des useurs--------------- 
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- end project-list -->

              <!----------------------------- Partie de Pagination ----------------------------->

              <div class="pt-3">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item ">
                    <?php
                    if (isset($_GET["page"])) { //on verifie si elle existe
                      $page = $_GET["page"];
                    }
                    if (empty($page)) {
                      $page = 1; //pour que la première page soit à 1
                    }

                    $precedent = $page;
                    if ($page != 1) {
                      $precedent = $page - 1;
                    }
                    echo "<a class='page-link' href='index.php?module=gestionUseur&action=gestionUseur&page=$precedent'>Précédent</a>";
                    ?>
                  </li>
                  <?php
                  for ($i = 1; $i <= $nbr_de_pages; $i++) {
                    if ($page != $i)
                      echo "<li class='page-item '><a class='page-link' href='index.php?module=gestionUseur&action=gestionUseur&page=$i'>$i</a>";
                    else
                      echo "<li class='page-item  active'><a class='page-link'>$i</a>";
                  ?>
                  <?php
                  }
                  ?>
                  <li class="page-item">
                    <?php
                    $suivant = $page + 1;
                    echo "<a class='page-link' href='index.php?module=gestionUseur&action=gestionUseur&page=$suivant'>Suivant</a>";
                    ?>
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

  //formulaire pour redamnder le mpd admin avant de faire la suppresion
  public function confirmationSuppresionUseur()
  {
  ?>
    <title>Connexion Compte | A2Z</title>

    <div class="container">
      <form action='index.php?module=gestionUseur&action=suppresionUseurConfirmer&idUseur=<?php echo (htmlspecialchars($_GET['idUseur'])); ?> ' method="post">
        <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
        <!--Token- -->

        <div class="row justify-content-md-center">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="login-screen">
              <div class="login-box">
                <a href="index.php?module=gestionUseur&action=gestionUseur" class="login-logo">
                  <img src="ressource/images/TabA2Z.png" alt="Logo A2Z">
                </a>
                <div class="or">
                  <span>Pour continuer, veuillez confirmer votre identité 😉</span>
                </div>
                <div class="boutonMdp">
                  <input id="premierMdp" type="password" name="motDePasse" class="form-control" placeholder="Saisissez votre mot de passe" required maxlength="100" onKeyUp="checkMdp()">
                  <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(premierMdp,oeil)"> </button>
                </div>
              </div>
              <div class="actions clearfix">
                <button type="submit" class="btn btn-primary btn-block">Suivant</button>
                <button onclick="window.location.href = 'index.php?module=gestionUseur&action=gestionUseur'" type="button" class="btn  btn-block">Annuler</button>

              </div>

            </div>
          </div>
        </div>
    </div>
    </form>
    </div>

  <?php
  }

  public function affichageInfoUseur($infoUseur)
  {

  ?>

    <div class="container">
      <div class="main-body">

        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src=" <?php echo $infoUseur['cheminImage'] ?>" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?php echo $infoUseur['identifiant'] ?></h4>
                    <p class="text-secondary mb-1">
                      <?php if ($infoUseur['idGroupes'] == 1) {
                      ?><?php echo "Professeur"; ?>
                    <?php
                      } else {
                    ?>
                      <?php echo "Admin"; ?>
                    <?php
                      } ?> </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Identifiant</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $infoUseur['identifiant'] ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $infoUseur['adresseMail'] ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Mot de Passe</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    *****************
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <a class="btn btn-info " href='index.php?module=gestionUseur&action=changementInfoUseur&idUseur=<?php echo $infoUseur['idUser'] ?>'>Modifier</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
  }


  public function formulaireModificationUseur($infoUseur)
  {

  ?>

    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="<?php echo $infoUseur['cheminImage'] ?>" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?php echo $infoUseur['identifiant'] ?></h4>
                    <p class="text-secondary mb-1"><?php if ($infoUseur['idGroupes'] == 1) {
                                                    ?><?php echo "Professeur"; ?>
                    <?php
                                                    } else {
                    ?>
                      <?php echo "Admin"; ?>
                    <?php
                                                    } ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <form action="index.php?module=gestionUseur&action=modificationUseur&idUser=<?php echo $infoUseur['idUser'] ?>" method="post">
                  <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                  <!--Token- -->
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Identifiant</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" id="identifiant" name="identifiant" required maxlength="50" placeholder="Identifiant" value="<?php echo $infoUseur['identifiant'] ?>" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" id="adresseMail" name="adresseMail" required maxlength="75" placeholder="E-mail" value="<?php echo $infoUseur['adresseMail'] ?>" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mot de Passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" class="form-control" id="motDePasse" name="motDePasse" required maxlength="100" value="*********" placeholder="Mot de Passe">
                      <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="Oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(motDePasse,Oeil)"> </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input type="submit" class="btn btn-primary px-4" value="Mettre à jour">
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <?php

  }


  //formulaire pour redamnder le mpd admin avant de faire la suppresion
  public function confirmationModificationUseur()
  {
  ?>
    <title>Modification Compte | A2Z</title>

    <div class="container">
      <form action='index.php?module=gestionUseur&action=modificationUseurConfirmer&idUseur=<?php echo (htmlspecialchars($_GET['idUseur'])); ?> ' method="post">
        <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
        <!--Token- -->

        <div class="row justify-content-md-center">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="login-screen">
              <div class="login-box">
                <a href="index.php?module=gestionUseur&action=gestionUseur" class="login-logo">
                  <img src="ressource/images/TabA2Z.png" alt="Logo A2Z">
                </a>
                <div class="or">
                  <span>Pour continuer, veuillez confirmer votre identité 😉</span>
                </div>
                <div class="boutonMdp">
                  <input id="premierMdp" type="password" name="motDePasse" class="form-control" placeholder="Saisissez votre mot de passe" required maxlength="100" onKeyUp="checkMdp()">
                  <button type="button" class="checkboxMdp"> <img alt="oeil affichage mot de passe" id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(premierMdp,oeil)"> </button>
                </div>
              </div>
              <div class="actions clearfix">
                <button type="submit" class="btn btn-primary btn-block">Suivant</button>
                <button onclick="window.location.href = 'index.php?module=gestionUseur&action=gestionUseur'" type="button" class="btn  btn-block">Annuler</button>

              </div>

            </div>
          </div>
        </div>
    </div>
    </form>
    </div>

  <?php
  }

  public function affichageSuppresionUseur()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'success',
        title: "L'utilisateur a été supprimé 😊 "
      })
    </script>
  <?php
  }
  public function affichageSuppresionCompteActuelleFaux()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'error',
        title: "Impossible de supprimer votre compte 😡 "
      })
    </script>
  <?php
  }

  public function affichageChangementInfoUseurReussit()
  {
  ?>
    <script src="Script_js/outils.js"></script>
    <script type="text/javascript">
      Toast.fire({
        icon: 'success',
        title: "L'utilisateur a été mit à jour 😊 "
      })
    </script>
<?php
  }
}

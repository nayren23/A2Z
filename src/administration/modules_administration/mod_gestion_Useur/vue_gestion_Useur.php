<?php
require_once "./Common/Classe_Generique/vue_generique.php";

require_once("./Common/Classe_Generique/vue_connexion_generique.php");
class VueConnexion_gestion_Useur extends Vue_connexion_generique
{


  //affichage de la liste des utilisateurs
  public function affichageListeUseur($resultat, $statUseur, $nbr_de_pages)
  {

?>
    <title>Liste Useur | A2Z</title>


    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-th text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1"><?php echo $statUseur[2]['userNumber'] ?></h5>
              <p class="text-muted mb-0">Total des Utilisateurs</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-th text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1"><?php echo $statUseur[0]['userNumber'] ?></h5>
              <p class="text-muted mb-0">Total des Professeurs</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
            <div class="card-body">
              <div class="float-right">
                <i class="fa fa-th text-primary h4 ml-3"></i>
              </div>
              <h5 class="font-size-20 mt-0 pt-1"><?php echo $statUseur[1]['userNumber'] ?></h5>
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
                    <input type="text" class="form-control" data-action="filter" data-filters="#dev-table" placeholder="Rechercher..." aria-describedby="project-search-addon" />
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
                            ?> <span class="text-success font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo "prof"; ?></span>
                          <?php
                            } else {
                          ?>
                            <span class="text-admin font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> <?php echo "admin"; ?></span>
                          <?php
                            } ?>
                        </td>
                        <!--Id Utilisateur -->
                        <td>****************</td>
                        <!--Id Utilisateur -->
                        <td>
                          <div class="action">
                            <!--Bouton Modifiaction -->
                            <a id='<?php echo $value['idUser']  ?>' href="#" class="text-success mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil h5 m-0"></i></a>
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
      <form action='index.php?module=gestionUseur&action=suppresionUseurConfirmer&idUseur=<?php echo (htmlspecialchars($_GET['idUseur'])); ?> 'method="post">
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
                  <span >Pour continuer, veuillez confirmer votre identité 😉</span>
                </div>
                  <div class="boutonMdp">
                    <input id="premierMdp" type="password" name="motDePasse" class="form-control" placeholder="Saisissez votre mot de passe" required maxlength="100" onKeyUp="checkMdp()">
                    <button type="button" class="checkboxMdp" > <img alt="oeil affichage mot de passe" id="oeil" src="ressource/images/oeilCacherMdp.png" onclick="basculerAffichageMotDePasse(premierMdp,oeil)"> </button>
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
  }}
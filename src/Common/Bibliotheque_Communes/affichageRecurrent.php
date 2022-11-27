<?php

function affichagMotDePasseDifferent()
{
?>
  <script src="Script_js/outils.js"></script>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: "Attention les mots de passe sont différents 😡 "
    })
  </script>

<?php
}

function affichagMotDePasseErrone()
{
?>
  <script src="Script_js/outils.js"></script>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: "Échec de l'authentification 😡 "
    })
  </script>

<?php
}

?>
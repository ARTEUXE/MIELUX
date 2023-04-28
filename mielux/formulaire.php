<link rel="stylesheet" href="./css/formulaire.css">

<?php

include("connexion.php");

if (!empty($_POST['login'])   and (!empty($_POST['password']))) {
  $recupLogin = $_POST['login'];
  $recupPassword = $_POST['password'];
  if ($recupLogin != "" && $recupPassword != "") { // si les saisies ne sont pas vides


    $db = connect_to_db();

    // Si tout va bien, on peut continuer

    // On récupère tout le contenu de la table user et le stock dans une variable
    $req = 'SELECT * FROM user';
    $exec = $db->prepare($req);
    $exec->execute();

    $result = $exec->fetchAll();
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    if ($recupLogin == $result[0]["login"] && $recupPassword == $result[0]["password"]) {
      // Connexion de l'utilisateur en utilisant des sessions ou des cookies

      $_SESSION['administrateur'] = true;

      (header('location:index.php'));
    } else {
      // Affichage d'un message d'erreur indiquant que les informations d'identification sont incorrectes
      echo "Les informations d'identification sont incorrectes.";
    }

    close_db($db);
  }
}
?>
<div class="pad">
  <div class="containerForm">
    <form class="form" action="index.php?page=formulaire" method="POST">
      <p class="heading">CONNEXION</p>
      <input id="user" type="text" class="input" name="login" placeholder="Username">
      <input id="pass" type="password" class="input" name="password" placeholder="Password">
      <button type="submit" id='submit' class="button">Se connecter</button>
    </form>
  </div>
</div>
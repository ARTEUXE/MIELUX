<link rel="stylesheet" href="./css/modif.css">

<?php
include("connexion.php"); // Inclure le fichier de connexion à la base de données
$db = connect_to_db(); // Établir la connexion à la base de données
//var_dump($_GET); // Afficher le contenu de la variable $_GET pour le débogage

if (isset($_GET["mielux"])) // Vérifier si le paramètre 'mielux' est présent dans la requête
{
  // Initialiser les variables avec les valeurs correspondantes de la requête GET
  $miel = $_GET['miel'];
  $contenu = $_GET['contenu'];
  $prix = $_GET['prix'];
  $mielux = $_GET['mielux'];

  // Définir la requête SQL pour mettre à jour les enregistrements correspondants dans la table 'vignette'
  $sql = "UPDATE vignette SET miel = :miel , prix = :prix , contenu = :contenu WHERE :mielux = miel";

  // Préparer la requête SQL en utilisant la connexion à la base de données
  $req = $db->prepare($sql);

  // Binder les valeurs des variables aux paramètres de la requête SQL
  $req->bindParam(':miel', $miel);
  $req->bindParam(':prix', $prix);
  $req->bindParam(':contenu', $contenu);
  $req->bindParam(':mielux', $mielux);

  // Afficher la requête préparée pour le débogage
  // print_r($req);

  // Exécuter la requête SQL préparée
  $req->execute();

  // Rediriger l'utilisateur vers une autre page
   header('Location: index.php?page=miel');
}
?>
<div class="container">
  <div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">


      <div class="pad">
        <div class="form">
          <p class="heading">Modifier un miel</p>
          <form action="index.php?page=modif_miel" method="GET">
            <input class="form" hidden type="text" name="page" value="modif_miel">


            <select for="mielux" class="form" name="mielux" id="mielux">
              <option id="mielux" name="mielux" disabled selected value="">-- Sélectionnez le miel à modifier -- </option>

              <?php
              $req = $db->prepare("SELECT `miel` FROM `vignette`");
              $req->execute();
              while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                // Stocker la valeur du champ "miel" dans une variable
                $mielux = $result["miel"];

                // Afficher une option dans la liste déroulante avec la valeur du miel
                echo '<option value="' . $mielux . '">' . $mielux . '</option>';
              }
              ?>

            </select>



            <div class="containerForm">
              <form class="form" action="index.php" method="POST">
                <input class="input" hidden type="text" name="page" value="modif_miel">
                <input id="miel" class="input" type="text" name="miel" placeholder="Nouveau nom du miel">
                <input id="prix" type="text" class="input" name="prix" placeholder="Nouveau prix (en €):">
                <textarea id="contenu" class="input" name="contenu" placeholder="nouvelle description du miel"></textarea>
                <button type="submit" class="button">modifier</button>
              </form>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-4">
    </div>
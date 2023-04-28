<?php
include("connexion.php"); // Connexion à la base de données

if (isset($_POST['miel'])) {
  $db = connect_to_db();
  // var_dump($_POST);
  if (
    isset($_POST['miel']) &&
    isset($_POST['contenu']) &&
    isset($_POST['prix'])
  ) {

    $miel = $_POST['miel'];
    $contenu = $_POST['contenu'];
    $prix = $_POST['prix'];

    $target_dir = "./image/"; // spécifiez le répertoire de destination
    //$target_file = $target_dir . basename($_FILES["image"]["name"]); // obtenez le nom de fichier téléchargé et ajoutez-le au chemin du répertoire de destination

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      // Le fichier a été téléchargé avec succès et il n'y a pas d'erreur






      $req = $db->prepare('INSERT INTO vignette (miel, contenu, prix, image) VALUES (:miel, :contenu, :prix, "")');
      $req->execute([
        ':miel' => $miel,
        ':contenu' => $contenu,
        ':prix' => $prix

      ]);

      // Récupération de l'ID de la dernière ligne insérée
      $last_id = strval($db->lastInsertId());
      ?><br><?php
// Affichera .php // retourne les trois derniers characteres (l'extension)
      $nom_image = $last_id.$_FILES["image"]["name"];
      $ext = substr($nom_image, strrpos($nom_image, '.') + 0);
      echo($ext);
?><br><?php echo "New record created successfully. Last inserted ID is: " . $last_id;
      $req = $db->prepare('UPDATE vignette SET image = :nom_image WHERE id = :last_id');
      $req->execute([
       
        ':nom_image' => $last_id . $ext ,
        ':last_id' => $last_id
      ]);
            // Vérifiez si le fichier a été téléchargé avec succès
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $last_id . $ext)) {
              echo "Le fichier " . basename($_FILES["image"]["name"]) . " a été téléchargé avec succès.";
            } else {
              echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
      close_db($db);
      // Redirection vers la page vignette.php
      header('Location: index.php?page=miel');
    } else {
      // Une erreur s'est produite lors du téléchargement du fichier
      echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
    }
  }
} else {
      ?>

  <div class="containerForm">
  <form class="form" action="index.php?page=ajouter_miel" method="POST" enctype="multipart/form-data">
    <p class="heading">Ajouter un miel</p>
    <input id="miel" class="input" type="text" name="miel" placeholder="Nom du miel" >
    <input id="prix" type="text" class="input" name="prix" placeholder="prix (en €):" >
    <input id="image" type="file" class="input" name="image" placeholder="Charger une image" required>
    <textarea id="contenu" class="input"  name="contenu" placeholder="Description du miel" ></textarea>
    <button type="submit"  class="button">ajouter</button>
  </form>
</div>
<?php
}



?>
<?php

include("connexion.php");
$db = connect_to_db();

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table user et le stock dans une variable
$req = $db->prepare("SELECT * FROM vignette");
$req->execute();
//Récupère la request dans une variable result

close_db($db);
// var_dump($req);
?>
<div class="row">


  <?php while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="card">
      <div class="card-image"><img src="./image/<?php echo ($result['image']); ?>"></div>
      <div class="nomMiel"><?php echo ($result['miel']); ?></div>
      <div class="Contenu"><?php echo ($result['contenu']); ?>
        <div class="prix"><?php echo ($result['prix']); ?>€</div>
      </div>
    </div>
  <?php
  }
  ?>
<?php
//referifier les commentaires car lié aux videos youtube ou ils parlent de profil
include "fonctions.php "; 

//$_POST['login'] ='ne';
//$_POST['password']='eleve';

// controle de reception de parametres
if (!empty($_POST['login'])   and (!empty($_POST['password']))) {
  $recupLogin = $_POST['login'];
  $recupPassword = $_POST['password'];
  if ($recupLogin != "" && $recupPassword != "") { // si les saisies ne sont pas vides


    $db = connect_to_db();

    // Si tout va bien, on peut continuer

    // On récupère tout le contenu de la table user et le stock dans une variable
    $req = 'SELECT * FROM eleve WHERE nom= :_nom and mdp = :_mdp';
    $exec = $db->prepare($req);
    $exec->bindParam(":_nom", $recupLogin , PDO::PARAM_STR);
    $exec->bindParam(":_mdp", $recupPassword , PDO::PARAM_STR);
    $exec->execute();

    $resultats = $exec->fetchAll();

    $i=0;
    $eleves = array();
    foreach($resultats as $row){
      $eleves[$i]['nom']= $row['nom'];
      $eleves[$i]['prenom']= $row['prenom'];
      $eleves[$i]['classe']= $row['classe'];

      $i++;
    }
    //le tableau $eleves contient tous les eleves (ici il y 'en aura que 1)


    $req = 'SELECT * FROM vignette ';
    $exec = $db->prepare($req);
    $exec->execute();

    $resultats = $exec->fetchAll();

    $i=0;
    $miels = array();
    foreach($resultats as $row){
      $miels[$i]['nom']= $row['miel'];
      $miels[$i]['prix']= $row['prix'];
      
      $i++;
    }

    close_db($db);

    //le tableau $miels contient tous les miels

    if( sizeof($eleves) >0){

      
      $datasDeRetour ['nom'] = $eleves[0]['nom'];
      $datasDeRetour ['prenom'] = $eleves[0]['prenom'];
      $datasDeRetour ['classe'] = $eleves[0]['classe'];
      $datasDeRetour ['state'] = true;

      //Construre une String avec les noms des miels
      $nomsDesMiels = '';
      foreach ($miels as $key => $value) {
        $nomsDesMiels .= $value['nom'].'#';
      }
      $nomsDesMiels = substr($nomsDesMiels, 0, -1);
      $datasDeRetour ['miels'] = $nomsDesMiels;


      //Construre une String avec les prix des miels
      $prixDesMiels = '';
      foreach ($miels as $key => $value) {
        $prixDesMiels .= $value['prix'].'#';
      }
      $prixDesMiels = substr($prixDesMiels, 0, -1);
      $datasDeRetour ['prix'] = $prixDesMiels;

      echo json_encode($datasDeRetour);
    } else{
      $datasDeRetour ['state'] = false;
      $datasDeRetour ['msg'] = "Inconnu dans la BDD";
      echo json_encode($datasDeRetour);
    }

  }else{
    $datasDeRetour ['state'] = false;
      $datasDeRetour ['msg'] = "les champs ne doivent pas être vides";
  }
}else{
  $datasDeRetour ['state'] = false;
    $datasDeRetour ['msg'] = "le post n'existe pas";
}


?>
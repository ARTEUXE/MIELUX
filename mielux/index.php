<?php
session_start();
$page_afficher = "";
if (isset($_GET['page'])) {
    $page_afficher = $_GET['page'];
} else {
    $page_afficher = "acceuil";
}
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// echo("<pre>");
// print_r($_FILES);
// echo("</pre>");
?>


<html>


    <title>MIELUX</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Lien vers le CSS sur le site Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Lien vers le CSS Local -->
    <link rel="stylesheet" href="./bootstrap/5.1.2/css/bootstrap.min.css">
    <!-- Lien vers le JS sur le site Bootsrap  (bundle inclut tout ce dont on a besoin)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="./bootstrap/5.1.2/js/bootstrap.bundle.min.js"></script>
    <!-- Ces liens sont necessaires pour fontawesome-->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/header.css">

    <link rel="stylesheet" href="./css/formulaire.css">
    <link rel="stylesheet" href="./css/acceuil.css">
    <link rel="stylesheet" href="./css/miel.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/test.css">
    <link rel="stylesheet" href="./css/apiculteur.css">
    <link rel="stylesheet" href="./js/script.js">


    </body>

    <header>
        <navbar id="menu" >

            <?php include("navbar.php") ?>
        </navbar>
    </header>

    <content>

        <?php


        switch ($page_afficher) {
            case 'connexion':
                include($page_afficher . ".php");
                break;

            case 'deconnexion':
                include($page_afficher . ".php");
                break;

            case 'formulaire':
                include($page_afficher . ".php");
                break;

            case 'apiculteur':
                include($page_afficher . ".php");
                break;

            case 'acceuil':
                include($page_afficher . ".php");
                break;

            case 'miel':
                include($page_afficher . ".php");
                break;
            case 'ajouter_miel':
                include($page_afficher . ".php");
                break;
            case 'delete_miel':
                include($page_afficher . ".php");
                break;
            case 'modif_miel':
                include($page_afficher . ".php");
                break;
        }
        ?>


    </content>



    <footer>

    </footer>


    
    </body>

</html>
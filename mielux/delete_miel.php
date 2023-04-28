<link rel="stylesheet" href="./css/sup.css">

<?php
include("connexion.php"); //la t'es co a la bdd

if (isset($_POST["miel"])) {
    

    $db = connect_to_db();
    $mielux = $_POST["miel"];
    $image = $_POST["image"];
    $req = $db->prepare("DELETE FROM vignette WHERE id = :mielux");
    $req->bindParam(':mielux', $mielux);
    $req->execute();

    $fichier = "./image/" . $image;

   // unlink($fichier);
    header('Location: index.php?page=miel');

    close_db($db);
} else {

?>
    <div class="containerForm">
        <form class="form" action="index.php?page=delete_miel" method="POST">
            <p class="heading">Ajouter un miel</p>

            <input class="form" hidden type="text" name="page" value="delete_miel">

            <select for="miel" class="form2" name="miel" id="miel">
                <option disabled selected value="">-- Sélectionnez le miel à supprimer -- </option>

                <!-- <form action="index.php?page=delete_miel" method="POST">
                    <input class="form-control" hidden type="text" name="page" value="delete_miel">

                    <label for="miel">Sélectionnez le miel : </label>
                    <select class="form-control" name="miel">
                        <option disabled selected value="">-- Selectionnez un miel -- </option> -->
                <?php
                $db = connect_to_db();
                $req = $db->prepare("SELECT id,image,miel FROM vignette");
                $req->execute();
                while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                    // Stocker la valeur du champ "miel" dans une variable
                    $miel = $result["miel"];
                    $image = $result["image"];
                    $id = $result["id"];
                    // Afficher une option dans la liste déroulante avec la valeur du miel
                    echo '<option value="' . $id . '">' . $miel . '</option>';
                }

                close_db($db);


                ?>


            </select>
            <br><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="image" value="<?php echo $image; ?>">
            <button type="submit" class="button">supprimer</button>
        </form>
    </div>

<?php
}

?>
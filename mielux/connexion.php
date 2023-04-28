<?php
    $host = "localhost";
    $user ="root";
    $password = "";
    $bdd = "mielux";

    function connect_to_db(){
        // Déclaration des variables globales
        global $host, $user, $password, $bdd;
        
        try
        {
            // Concaténation des variables pour créer l'URL de connexion à la base de données
            $host_db_charset = 'mysql:host='.$host.';dbname='.$bdd.';charset=UTF8';
            
            // Connexion à la base de données à l'aide des informations de connexion
            $pdo_bdd = new PDO($host_db_charset, $user, $password);
        }
        
        catch (Exception $e)
        {
            // Si une erreur se produit, afficher un message d'erreur
            die('Erreur : ' . $e->getMessage());
        }
        
        // Retourner la connexion si tout s'est bien passé
        return $pdo_bdd;
    }
    




    
    function close_db($pdo_bdd){
        $pdo_bdd = null;
    }

?>


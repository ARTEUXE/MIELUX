<?php
	function connect_to_db(){
		$login = "root";
		$mdp ="";
		$db = "mielux";
		$serveur = "localhost";
		try{
			$conn = new PDO("mysql:host=$serveur;dbname=$db", $login, $mdp);
			return $conn;
		}catch(PDOException $e){
			print "Erreur de connsexion PDO";
			die();
		}	
	}

	function close_db($pdo_bdd){
        $pdo_bdd = null;
    }
?>
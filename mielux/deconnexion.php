<?php
unset($_SESSION["administrateur"]); // désactive la session "administrateur"
(header('location:index.php'));
?>
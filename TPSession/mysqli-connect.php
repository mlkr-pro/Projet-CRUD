<?php
require_once 'db_config.php';
if (mysqli_connect_errno()) {
    throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
}
else{
    echo "Connexion réussie au SGBDR MySQL et on travaille sur la base de donnée club";
}
?>
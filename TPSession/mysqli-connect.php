<?php
$link = mysqli_connect("mysql-lecaer.alwaysdata.net","lecaer","Nator.95","lecaer_club");
if (mysqli_connect_errno()) {
    throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
}
else{
    echo "Connexion réussie au SGBDR MySQL et on travaille sur la base de donnée club";
}
?>
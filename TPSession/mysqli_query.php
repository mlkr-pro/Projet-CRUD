<?php
require_once 'db_config.php';
if (mysqli_connect_errno()) {
    throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
}
else{
    echo "Connexion réussie au SGBDR MySQL et on travaille sur la base de donnée club";
}

$query = "SELECT nom, prenom FROM adherent";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
echo "<br> Tableau numérique Nom : ".$row[0] ."&nbsp;&nbsp;". "Prénom : ".$row[1]."";

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "<br> Tableau associatif Nom : ".$row["nom"] ."&nbsp;&nbsp;". "Prénom : ".$row["prenom"]."";

$row = mysqli_fetch_array($result, MYSQLI_BOTH);
echo "<br> Tableau numérique et associatif Nom : ".$row[0] ."&nbsp;&nbsp;". "Prénom : ".$row["prenom"]."";

if ($result = mysqli_query($link, $query)){
    printf("<br> Select a retourné %d lignes.\n", mysqli_num_rows($result));
    echo "<br><br>Nom Prénom des adhérents<br>";
    while ($row = mysqli_fetch_assoc($result)){
        //printf("<br> %s (%s)\n", $row["nom"], $row["prenom"]);
        echo "Nom : ".$row["nom"] ."&nbsp;&nbsp;". "Prénom : ".$row["prenom"]."<br>";
    }

    mysqli_free_result($result);
}
mysqli_close($link);
?> 
<?php
require_once 'db_config.php';
if (mysqli_connect_errno()) {
    throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
}

mysqli_set_charset($mysqli, "utf8");

if (isset($_POST['nom'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    if ($prenom == "") {
        $requete = "SELECT * FROM adherent WHERE nom = '$nom'";
    } else {
        $requete = "SELECT * FROM adherent WHERE nom = '$nom' AND prenom = '$prenom'";
    }

    $result = mysqli_query($mysqli, $requete);
    if (!$result) {
        die("Erreur SQL : " . mysqli_error($mysqli));
    }

    echo "<h1>Résultat(s) de la recherche</h1>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo "ID : ".$row['id']."<br>";
            echo "Nom : ".$row['nom']."<br>";
            echo "Prénom : ".$row['prenom']."<br>";
            echo "Date de naissance : ".$row['dateNaissance'];
            echo "</p><hr>";
        }
    } else {
        echo "<p>Aucun adhérent trouvé.</p>";
    }

    echo '<p><a href="index.php">Nouvelle recherche</a></p>';
}

mysqli_close($link);
?>
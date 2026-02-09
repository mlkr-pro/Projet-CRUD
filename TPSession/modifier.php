<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

require_once 'db_config.php';

$id = 0;
$row = ['nom'=>'', 'prenom'=>'', 'dateNaissance'=>''];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = "SELECT * FROM adherent WHERE id = $id";
    $res = mysqli_query($link, $req);
    $row = mysqli_fetch_assoc($res);
}

if (isset($_POST['modifier'])) {
    $idToUpdate = $_POST['id'];
    $nouveauNom = mysqli_real_escape_string($link, $_POST['nouveauNom']);
    $nouveauPrenom = mysqli_real_escape_string($link, $_POST['nouveauPrenom']);
    $nouvelleDate = mysqli_real_escape_string($link, $_POST['nouvelleDate']);

    $reqUpdate = "UPDATE adherent SET nom='$nouveauNom', prenom='$nouveauPrenom', dateNaissance='$nouvelleDate' WHERE id=$idToUpdate";
    
    if (mysqli_query($link, $reqUpdate)) {
        echo "<h1>Modification effectuée avec succès.</h1>";
        echo "<a href='index.php'>Retour à l'accueil</a>";
        exit;
    } else {
        echo "Erreur : " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier l'adhérent</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <label>Nom</label>
            <input type="text" name="nouveauNom" value="<?php echo $row['nom']; ?>" required>
            
            <label>Prénom</label>
            <input type="text" name="nouveauPrenom" value="<?php echo $row['prenom']; ?>" required>
            
            <label>Date Naissance</label>
            <input type="date" name="nouvelleDate" value="<?php echo $row['dateNaissance']; ?>" required>
            
            <div class="text-center">
                <input type="submit" name="modifier" value="💾 Enregistrer">
            </div>
        </form>
        <div class="text-center">
            <a href="index.php">Annuler</a>
        </div>
    </div>
</body>
</html>
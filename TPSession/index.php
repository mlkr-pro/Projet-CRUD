<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$mysqli = mysqli_connect("mysql-lecaer.alwaysdata.net", "lecaer", "Nator.95", "lecaer_club");
if (mysqli_connect_errno()) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
mysqli_set_charset($mysqli, "utf8");

$mode = "recherche"; 
$message = "";
$listeAdherents = null;
$nomPreRempli = "";
$prenomPreRempli = "";

if (isset($_POST['action_ajout'])) {
    $nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
    $prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);
    $date = mysqli_real_escape_string($mysqli, $_POST['dateNaissance']);
    
    $req = "INSERT INTO adherent (nom, prenom, dateNaissance) VALUES ('$nom', '$prenom', '$date')";
    if (mysqli_query($mysqli, $req)) {
        $message = "Adhérent ajouté avec succès !";
        $mode = "recherche"; 
    } else {
        $message = "Erreur SQL : " . mysqli_error($mysqli);
        $mode = "ajout";
    }
}

if (isset($_POST['rechercher'])) {
    $nomRech = trim($_POST['nom_rech']);
    $prenomRech = trim($_POST['prenom_rech']);

    if (empty($nomRech) && empty($prenomRech)) {
        $message = "Veuillez remplir au moins un champ (Nom ou Prénom).";
    } else {
        $conditions = array();

        if (!empty($nomRech)) {
            $safeNom = mysqli_real_escape_string($mysqli, $nomRech);
            $conditions[] = "nom = '$safeNom'";
        }

        if (!empty($prenomRech)) {
            $safePrenom = mysqli_real_escape_string($mysqli, $prenomRech);
            $conditions[] = "prenom = '$safePrenom'";
        }

        $sqlWhere = implode(" AND ", $conditions);
        $req = "SELECT * FROM adherent WHERE $sqlWhere";
        
        $res = mysqli_query($mysqli, $req);
        
        if ($res && mysqli_num_rows($res) > 0) {
            $mode = "liste";
            $listeAdherents = $res;
        } else {
            $mode = "ajout";
            $nomPreRempli = $nomRech;
            $prenomPreRempli = $prenomRech;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Membre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-nav">
            <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']); ?> 👋</h2>
            <a href="logout.php" class="logout-btn">Se déconnecter</a>
        </div>

        <?php if($message) echo "<div class='msg-success'>$message</div>"; ?>

        <?php if ($mode == "recherche") : ?>
            <h1>Rechercher un adhérent</h1>
            <p class="text-center">Veuillez saisir le nom, le prénom ou les deux.</p>
            <form action="" method="POST">
                <label>Nom</label>
                <input type="text" name="nom_rech" placeholder="Ex: Dupont">
                
                <label>Prénom</label>
                <input type="text" name="prenom_rech" placeholder="Ex: Jean">
                
                <div class="text-center">
                    <input type="submit" name="rechercher" value="🔍 Rechercher">
                </div>
            </form>

        <?php elseif ($mode == "liste") : ?>
            <h1>Résultats de la recherche</h1>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nom</th><th>Prénom</th><th>Date Naissance</th><th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($listeAdherents)): ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><strong><?php echo strtoupper($row['nom']); ?></strong></td>
                        <td><?php echo ucfirst($row['prenom']); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($row['dateNaissance'])); ?></td>
                        <td>
                            <a href="modifier.php?id=<?php echo $row['id']; ?>" class="btn btn-small">✏️ Modifier</a>
                            <a href="supprimer.php?id=<?php echo $row['id']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ?');">🗑️ Supprimer</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-2">
                <a href="index.php">← Nouvelle recherche</a>
            </div>

        <?php elseif ($mode == "ajout") : ?>
            <h1>Adhérent introuvable</h1>
            <p class="text-center">Aucun résultat. Souhaitez-vous ajouter ce membre ?</p>
            
            <form action="" method="POST">
                <input type="hidden" name="action_ajout" value="1">
                
                <label>Nom</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($nomPreRempli); ?>" required>
                
                <label>Prénom</label>
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($prenomPreRempli); ?>" required>
                
                <label>Date de naissance</label>
                <input type="date" name="dateNaissance" required>
                
                <div class="text-center">
                    <input type="submit" value="➕ Ajouter l'adhérent">
                </div>
            </form>
            <div class="text-center">
                <a href="index.php">Annuler</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php mysqli_close($mysqli); ?>
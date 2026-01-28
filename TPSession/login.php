<?php
session_start();

$loginValide = "toto";
$pwdValide = "1234";

$erreur = "";

if (isset($_POST['connecter'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if ($login === $loginValide && $pass === $pwdValide) {
        $_SESSION['user'] = $login;
        header("Location: index.php");
        exit();
    } else {
        $erreur = "Mauvais identifiant ou mot de passe.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 500px; margin-top: 10vh;">
        <h2 class="text-center">ESPACE MEMBRE</h2>
        <h3 class="text-center" style="font-weight: 300; margin-bottom: 30px;">Identification</h3>
        
        <form action="" method="POST">
            <label>Login</label>
            <input type="text" name="login" placeholder="Votre identifiant" required>
            
            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="Votre mot de passe" required>
            
            <input type="submit" name="connecter" value="Se connecter" style="width:100%">
        </form>
        
        <?php if($erreur) echo "<div class='msg-error'>$erreur</div>"; ?>
    </div>
</body>
</html>
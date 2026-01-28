<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Session en PHP</title>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['count'])) {
    echo (" contenu de la variable \$_SESSION['count'] = " . $_SESSION['count'] . " en fonction du nombre d'exécution du fichier creerVariableSession.php" );
    echo ("<br />");
} 
else {
    echo (" la variable \$_SESSION['count'] est supprimée " );
    echo ("<br />");
}

echo (" contenu de la variable \$_COOKIE[] après démarrage de session : " );
echo ("<br />");
print_r($_COOKIE);
?>
</body>
</html>
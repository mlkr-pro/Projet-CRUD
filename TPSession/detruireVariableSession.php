<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Supprimer un élément dans $_SESSION</title>
</head>
<body>
<?php
session_start();

unset($_SESSION['count']);

if (isset($_SESSION['count'])) {
    echo (" contenu de la variable après suppression \$_SESSION['count'] = " . $_SESSION['count'] );
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
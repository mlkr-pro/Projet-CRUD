<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Session en PHP</title>
</head>
<body>
<?php
session_start();

echo(" contenu de la variable SID = " );
echo SID;
echo ("<br />");

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
    echo (" contenu de la variable après affectation \$_SESSION['count'] = " . $_SESSION['count'] );
    echo ("<br />");
} 
else {
    $_SESSION['count']++;
    echo (" contenu de la variable après incrémentation \$_SESSION['count'] = " . $_SESSION['count'] );
    echo ("<br />");
}

echo (" contenu de la variable \$_COOKIE[] après démarrage de session : " );
echo ("<br />");
print_r($_COOKIE);
?>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

$mysqli = mysqli_connect("mysql-lecaer.alwaysdata.net","lecaer","Nator.95","lecaer_club");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = "DELETE FROM adherent WHERE id = $id";
    mysqli_query($mysqli, $requete);
}

header("Location: index.php");
exit;
?>
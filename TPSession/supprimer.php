<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

require_once 'db_config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = "DELETE FROM adherent WHERE id = $id";
    mysqli_query($link, $requete);
}

header("Location: index.php");
exit;
?>
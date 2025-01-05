<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];

?>
<link href="assets/css/navbar.css">
    <?php require_once '../public/navbar.php'; ?>

    <?php require_once '../public/etudiant.php';?>


<!--    --><?php //require_once '../public/footer.php'; ?>


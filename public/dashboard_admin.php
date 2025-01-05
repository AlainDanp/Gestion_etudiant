<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];
    require_once '../public/navbar.php';
    require_once '../public/admin.php';

    require_once '../public/footer.php';
?>
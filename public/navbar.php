<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? 'guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="assets/images/keyce.jpg" alt="Keyce">
            </span>
            <div class="text header-text">
                <span class="name">Keyce</span>
                <span class="profession">Academy</span>
            </div>
        </div>
        <i class="bx bx-chevron-right toggle"></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="search" placeholder="Recherche...">
            </li>
            <ul class="menu-links">
                <li class="nav-links">
                    <a href="#">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="text nav-text">Accueil</span>
                    </a>
                </li>

                <!-- Liens spécifiques aux étudiants -->
                <?php if ($role === 'etudiant'): ?>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-book-alt icon"></i>
                            <span class="text nav-text">Mes Cours</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-graduation icon"></i>
                            <span class="text nav-text">Mes Notes</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-user icon"></i>
                            <span class="text nav-text">Profil</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxl-shopify icon"></i>
                            <span class="text nav-text">Calendrier</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Liens spécifiques aux admins -->
                <?php if ($role === 'admin'): ?>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-group icon"></i>
                            <span class="text nav-text">Gérer Étudiants</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-book-alt icon"></i>
                            <span class="text nav-text">Gérer Cours  </span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-report icon"></i>
                            <span class="text nav-text">Rapports</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bxs-folder icon"></i>
                            <span class="text nav-text">Ressources</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class='bx bxs-message-alt-detail icon'></i>
                            <span class="text nav-text">Boîte à Idées </span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Liens communs -->
                <li class="nav-links">
                    <a href="#">
                        <i class='bx bxs-wrench icon'></i>
                        <span class="text nav-text">Options</span>
                    </a>
                </li>
                <li class="nav-links">
                    <a href="#">
                        <i class='bx bxs-bell icon'></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <li class="nav-links">
                <a href="logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Déconnexion</span>
                </a>
            </li>
            <li class="mode">
                <div class="moon-sun">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Mode Nuit</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>
<section class="home">
    <?php
    include 'etudiant.php';
    ?>
</section>

<script src="assets/js/Dashboard.js"></script>
</body>
</html>

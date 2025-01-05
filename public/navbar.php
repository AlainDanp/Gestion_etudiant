<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>
<body>
<div class="header">
    <nav class="nav container">
        <div class="nav__data">
            <a href="#" class="nav__logo">
                <i class="ri-planet-line"></i> KeYcE TP
            </a>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__burger"></i>
                <i class="ri-close-line nav__close"></i>
            </div>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li><a href="#" class="nav__link">Accueil (Dashboard)</a></li>
                <!-- Section pour l'admin uniquement -->
                <?php if ($user && $user['role'] === 'admin'): ?>
                    <li><a href="#" class="nav__link">Statistiques</a></li>
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Gestion <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-pie-chart-line"></i> Étudiants
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-arrow-up-down-line"></i> Classes
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Organisation  <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-arrow-up-down-line"></i> Cours
                                </a>
                            </li>
                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-bar-chart-line"></i> Element <i class="ri-add-line dropdown__add"></i>
                                </div>

                                <ul class="dropdown__submenu">
                                    <li>
                                        <a href="#" class="dropdown__sublink">
                                            <i class="ri-file-list-line"></i> Documents
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown__sublink">
                                            <i class="ri-cash-line"></i> Payments
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                <?php endif; ?>

                <!-- Section pour les étudiants uniquement -->
                <?php if ($user && $user['role'] === 'etudiant'): ?>
                    <li><a href="#" class="nav__link">Mes Cours</a></li>
                    <li><a href="#" class="nav__link">Mes Notes</a></li>
                <?php endif; ?>

                <!-- Section pour tous les utilisateurs connectés -->
                <?php if ($user): ?>
                    <li><a href="#" class="nav__link">Profil</a></li>
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Compte <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-notification-3-line"></i> Notification
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-message-2-line"></i> Message
                                </a>
                            </li>
                            <li>
                                <a href="logout.php" class="dropdown__link">
                                    <i class="ri-logout-box-line"></i> Déconnexion
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="login.php" class="nav__link">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>

<script src="assets/js/main.js"></script>
</body>
</html>

<?php
session_start();

require_once '../classes/DBConnection.php';

use App\DBConnection;

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Connexion à la base de données
    $db = DBConnection::getConnection();

    // Recherche de l'utilisateur
    $query = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $error = "Utilisateur non trouvé.";
    } else {
        // Vérification du mot de passe
        if (password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];
            // Redirection en fonction du rôle
            if ($user['role'] === 'admin') {
                header('Location: dashboard_admin.php');
            } else {
                header('Location: dashboard.php');
            }
            exit();
        } else {
            $error = "passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Etudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-container">
            <div class="sombre"></div>
            <div class="drop"></div>
            <div class="content">
                <h1>Connexion</h1>
                <?php if ($error): ?>
                    <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label  for="email">Email :</label>
                        <input type="email" id="email" name="email" required placeholder="Entrer votre Email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required placeholder="Entrer votre Mot de passe">
                    </div>
                    <button type="submit" class="btn">Connexion</button>
                </form>
            </div>
        <div class="text">
            <p > Page de connexion</p>
        </div>
    </div>
</body>
</html>

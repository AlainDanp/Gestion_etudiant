<?php
session_start();
require_once '../classes/DBConnection.php';

use App\DBConnection;

$error = null;
$success = null;

// Traitement du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : 'etudiant'; // Par défaut, rôle étudiant

    // Validation des champs
    if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'adresse email est invalide.";
    } else {
        // Connexion à la base de données
        $db = DBConnection::getConnection();

        // Vérifier si l'email existe déjà
        $query = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $query->execute([$email]);
        if ($query->fetch()) {
            $error = "Cet email est déjà utilisé.";
        } else {
            // Hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base
            $insertQuery = $db->prepare("
                INSERT INTO utilisateurs (nom, prenom, email, role, mot_de_passe) 
                VALUES (?, ?, ?, ?, ?)
            ");
            $insertSuccess = $insertQuery->execute([$nom, $prenom, $email, $role, $hashedPassword]);

            if ($insertSuccess) {
                $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            } else {
                $error = "Une erreur est survenue lors de l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="index-container">
        <div class="sombre"></div>
        <div class="drop"></div>
        <div class="content">
            <h1>Inscription</h1>
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="success"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Rôle :</label>
                    <select id="role" name="role">
                        <option value="etudiant" selected>Étudiant</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <button type="submit" class="btn">S'inscrire</button>
            </form>
        </div>
        <div class="text2">
            <p > Page d'insciption</p>
        </div>
    </div>
</body>
</html>

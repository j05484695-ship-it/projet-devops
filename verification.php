<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if ($_POST['action'] == 'register') {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([$username, $email, $hash]);
            echo "Inscription réussie ! <a href='index.php'>Connectez-vous ici</a>";
        } catch (Exception $e) {
            echo "Erreur : Pseudo ou Email déjà utilisé.";
        }
    }

    if ($_POST['action'] == 'login') {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nom_utilisateur'];
            header('Location: profil.php'); // Redirection vers la vue profil
            exit();
        } else {
            echo "Identifiants incorrects. <a href='index.php'>Réessayer</a>";
        }
    }
} else {
    header('Location: index.php');
}
?>
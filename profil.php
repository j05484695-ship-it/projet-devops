<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) { header('Location: index.php'); exit(); }

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM profils WHERE user_id = ?");
$stmt->execute([$user_id]);
$profil = $stmt->fetch() ?: [
    'telephone' => 'Non renseigné',
    'age' => '?',
    'profession' => 'Non renseigné',
    'sexe' => 'Non spécifié'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #a855f7;
            --bg: #f8fafc;
            --card-bg: rgba(255, 255, 255, 0.8);
            --text: #1e293b;
        }

        /* Mode Sombre */
        body.dark-mode {
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f1f5f9;
        }

        body { 
            font-family: 'Poppins', sans-serif; 
            background: var(--bg);
            background-image: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                              radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%);
            display: flex; justify-content: center; align-items: center; 
            min-height: 100vh; margin: 0; color: var(--text);
            transition: background 0.5s ease;
        }

        .card { 
            background: var(--card-bg); 
            backdrop-filter: blur(12px); /* Effet flou derrière la carte */
            padding: 40px; border-radius: 24px; 
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); 
            width: 100%; max-width: 380px; text-align: center;
            border: 1px solid rgba(255,255,255,0.1);
            transform: translateY(20px); opacity: 0;
            animation: slideUp 0.6s forwards ease-out;
        }

        @keyframes slideUp {
            to { transform: translateY(0); opacity: 1; }
        }

        .avatar-container { position: relative; width: 100px; margin: 0 auto 20px; }
        .avatar { 
            width: 100px; height: 100px; background: linear-gradient(45deg, var(--primary), var(--secondary));
            border-radius: 50%; display: flex; align-items: center; justify-content: center; 
            box-shadow: 0 10px 15px rgba(99, 102, 241, 0.3);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .avatar:hover { transform: rotate(15deg) scale(1.1); }
        .avatar i { font-size: 45px; color: white; }

        .info-grid { display: grid; grid-template-columns: 1fr; gap: 12px; margin: 25px 0; }
        .info-item { 
            background: rgba(255,255,255,0.05); padding: 12px; border-radius: 15px;
            display: flex; align-items: center; gap: 15px; 
            transition: 0.3s; border: 1px solid transparent;
        }
        .info-item:hover { background: rgba(99, 102, 241, 0.1); border-color: var(--primary); transform: translateX(5px); }
        .info-item i { color: var(--primary); width: 20px; }

        .btn-edit { 
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white; text-decoration: none; padding: 14px; border-radius: 12px; 
            display: block; font-weight: 600; margin-top: 20px;
            box-shadow: 0 4px 15px rgba(168, 85, 247, 0.4);
            transition: 0.3s ease;
        }
        .btn-edit:hover { opacity: 0.9; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(168, 85, 247, 0.6); }

        .theme-toggle {
            position: absolute; top: 20px; right: 20px;
            cursor: pointer; font-size: 24px; color: var(--primary);
            transition: 0.3s;
        }
    </style>
</head>
<body id="body">

<i class="fas fa-moon theme-toggle" id="themeBtn" onclick="toggleTheme()"></i>

<div class="card">
    <div class="avatar-container">
        <div class="avatar"><i class="fas fa-user-ninja"></i></div>
    </div>
    
    <h2 style="margin-bottom: 5px;">Profil Explorateur</h2>
    <p style="font-size: 14px; opacity: 0.7;">Prêt pour la prochaine aventure ?</p>

    <div class="info-grid">
        <div class="info-item"><i class="fas fa-phone"></i> <span><?= htmlspecialchars($profil['telephone']) ?></span></div>
        <div class="info-item"><i class="fas fa-calendar-day"></i> <span><?= htmlspecialchars($profil['age']) ?> ans</span></div>
        <div class="info-item"><i class="fas fa-briefcase"></i> <span><?= htmlspecialchars($profil['profession']) ?></span></div>
        <div class="info-item"><i class="fas fa-venus-mars"></i> <span><?= htmlspecialchars($profil['sexe']) ?></span></div>
    </div>

    <a href="modifier_profil.php" class="btn-edit">
        <i class="fas fa-magic"></i> Personnaliser
    </a>

    <a href="index.php style="color: #ef4444; text-decoration: none; font-size: 13px; display: block; margin-top: 20px; font-weight: 600;">
        <i class="fas fa-power-off"></i> Déconnexion
    </a>
</div>

<script>
    function toggleTheme() {
        const body = document.getElementById('body');
        const btn = document.getElementById('themeBtn');
        body.classList.toggle('dark-mode');
        
        if(body.classList.contains('dark-mode')) {
            btn.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('theme', 'dark');
        } else {
            btn.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('theme', 'light');
        }
    }

    // Garder le thème au rafraîchissement
    if(localStorage.getItem('theme') === 'dark') {
        toggleTheme();
    }
</script>

</body>
</html>
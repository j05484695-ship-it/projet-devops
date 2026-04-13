<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application - Bienvenue</title>
    <style>
        /* Reset et Fond */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 

        font-family:Poppins; 
            min-height: 100vh;
            background: linear-gradient(135deg, #002fff 0%, #002aff 100%);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* En-tête de bienvenue */
        .welcome-header {
            text-align: center;
            color: white;
            margin-bottom: 50px;
            max-width: 600px;
        }

        .welcome-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .welcome-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Conteneur des formulaires */
        .forms-wrapper {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            width: 100%;
        }

        /* Style des Formulaires */
        form { 
            background: rgba(255, 255, 255, 0.98); 
            padding: 40px; 
            border-radius: 20px; 
            width: 100%;
            max-width: 360px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        form:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        h2 { 
            color: #2d3436; 
            margin-bottom: 25px; 
            text-align: center;
            font-weight: 700;
            font-size: 1.5rem;
        }

        /* Champs de saisie */
        input { 
            width: 100%; 
            margin-bottom: 18px; 
            padding: 14px 16px; 
            border: 2px solid #edf2f7; 
            border-radius: 10px; 
            outline: none;
            transition: all 0.3s;
            font-size: 15px;
            background: #f8fafc;
        }

        input:focus {
            border-color: #764ba2;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(118, 75, 162, 0.1);
        }

        /* Boutons */
        button { 
            width: 100%; 
            padding: 14px; 
            cursor: pointer; 
            border: none; 
            border-radius: 10px; 
            color: white; 
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-reg { 
            background: #4a5568; 
        }

        .btn-log { 
            background: #2ecc71; 
        }

        button:hover { 
            filter: brightness(1.1);
            transform: scale(1.02);
        }

        button:active { transform: scale(0.98); }

        .footer-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #718096;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-link:hover { color: #764ba2; }

        /* Responsive Mobile */
        @media (max-width: 480px) {
            .welcome-header h1 { font-size: 1.8rem; }
            form { padding: 30px 20px; }
        }
    </style>
</head>
<body>

    <header class="welcome-header">
        <h1>BIENVENUE </h1>
        <p>Remplis en toute confidentialité tes infos personnelles pour accéder à ton espace.</p>
    </header>

    <main class="forms-wrapper">
        <form action="verification.php" method="POST">
            <h2>Créer un compte</h2>
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" placeholder="Pseudo" required>
            <input type="email" name="email" placeholder="Adresse Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="btn-reg">Rejoindre l'aventure</button>
            <a href="#" class="footer-link">Conditions d'utilisation</a>
        </form>

        <form action="verification.php" method="POST">
            <h2>Bon retour !</h2>
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Pseudo" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="btn-log">Se connecter</button>
            <a href="#" class="footer-link">Mot de passe oublié ?</a>
        </form>
    </main>

</body>
</html>
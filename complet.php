<?php
// ... Ton code PHP existant reste identique en haut du fichier ...
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --text-main: #2d3748;
            --input-bg: #f8fafc;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background: var(--bg-gradient); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
        }

        .form-container { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); 
            width: 100%;
            max-width: 400px; 
            transition: transform 0.3s ease;
        }

        h3 { 
            margin-top: 0; 
            color: var(--text-main); 
            font-size: 1.5rem; 
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        input, select { 
            width: 100%; 
            padding: 12px 15px 12px 45px; 
            border: 2px solid #e2e8f0; 
            border-radius: 12px; 
            box-sizing: border-box; 
            font-size: 14px;
            background: var(--input-bg);
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        button { 
            width: 100%; 
            padding: 14px; 
            background: var(--primary-color); 
            color: white; 
            border: none; 
            border-radius: 12px; 
            cursor: pointer; 
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
            transition: background 0.3s ease, transform 0.1s active;
        }

        button:hover { background: var(--primary-hover); }
        button:active { transform: scale(0.98); }

        .cancel { 
            display: block; 
            text-align: center; 
            margin-top: 20px; 
            text-decoration: none; 
            color: #64748b; 
            font-size: 14px;
            transition: color 0.2s;
        }

        .cancel:hover { color: #1e293b; }

        /* Style spécifique pour le select */
        select { appearance: none; cursor: pointer; }
    </style>
</head>
<body>

    <div class="form-container">
        <h3><i class="fas fa-user-edit"></i> Modifier le profil</h3>
        
        <form method="POST">
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="telephone" placeholder="Téléphone" value="<?= $p['telephone'] ?? '' ?>" required>
            </div>

            <div class="input-group">
                <i class="fas fa-birthday-cake"></i>
                <input type="number" name="age" placeholder="Âge" value="<?= $p['age'] ?? '' ?>" required>
            </div>

            <div class="input-group">
                <i class="fas fa-briefcase"></i>
                <input type="text" name="profession" placeholder="Profession" value="<?= $p['profession'] ?? '' ?>" required>
            </div>

            <div class="input-group">
                <i class="fas fa-venus-mars"></i>
                <select name="sexe">
                    <option value="Homme" <?= (isset($p['sexe']) && $p['sexe'] == 'Homme') ? 'selected' : '' ?>>Homme</option>
                    <option value="Femme" <?= (isset($p['sexe']) && $p['sexe'] == 'Femme') ? 'selected' : '' ?>>Femme</option>
                    <option value="Autre" <?= (isset($p['sexe']) && $p['sexe'] == 'Autre') ? 'selected' : '' ?>>Autre</option>
                </select>
            </div>

            <button type="submit">Enregistrer les modifications</button>
        </form>
        
        <a href="profil.php" class="cancel">Retour au profil</a>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px; /* Limiter la largeur du formulaire */
            text-align: center;
        }

        .login-container img {
            width: 60px; /* Ajuster la taille de l'icône */
            height: 60px;
            margin-bottom: 20px; /* Espace sous l'icône */
        }

        h2 {
            margin-bottom: 20px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Changer la couleur du bouton reset */
        .reset-button {
            background-color: #f44336; /* Rouge */
            color: white;
        }

        .reset-button:hover {
            background-color: #e53935; /* Rouge foncé au survol */
        }

        a {
            text-align: center;
            display: block;
            color: #555;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Ajouter l'icône de l'utilisateur au-dessus du titre -->
        <img src="cnx.jpg" alt="Icône utilisateur"> <!-- Remplacer par le chemin de votre image -->
        <h2>Connexion</h2>
        <form action="login.php" method="POST">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
            <button type="reset" class="reset-button">Reset</button>

            <a href="register.php">Créer un compte</a>
        </form>
    </div>
</body>
</html>

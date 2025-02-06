<?php
session_start();
require_once('db.php'); // Connexion à la base de données
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'"; // Recherche par nom d'utilisateur ou email
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Vérifier si l'utilisateur existe et que le mot de passe correspond
    if ($user && password_verify($password, $user['password_hash'])) { // Comparer avec password_hash
        // Créer une session pour l'utilisateur
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: welcome.php"); // Rediriger vers la page d'accueil
        exit(); // Pour s'assurer que le script s'arrête après la redirection
    } else {
        $message = "❌ Identifiant ou mot de passe incorrect.";    // Message d'erreur
    }
}
?>

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
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #f44336;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: bold;
        }

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
            color: #4CAF50;
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
        <h2>Connexion</h2>
        
        <!-- Affichage du message d'erreur s'il y en a un -->
        <?php if ($message): ?>
            <div class="error-message"><?php echo $message; ?></div>
        <?php endif; ?>

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

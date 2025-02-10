<?php
require_once('db.php'); // Connexion à la base de données
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Vérifier si l'utilisateur ou l'email existe déjà
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $message = "❌ Nom d'utilisateur ou email déjà pris.";
    } else {
        // Hacher le mot de passe avant de l'enregistrer
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $query = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            header("Location: index.php"); // Rediriger vers la page de connexion
            exit();
        } else {
            $message = "Erreur lors de l'inscription : " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 10px;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px;
            text-align: center; /* Centrer tout le contenu du formulaire */
        }

        .login-container img {
            width: 60px; /* Ajuster la taille de l'icône */
            height: 60px;
            margin-bottom: 20px; /* Espacement sous l'icône */
            display: block; /* Permet de centrer l'image */
            margin-left: auto; /* Centrer horizontalement */
            margin-right: auto; /* Centrer horizontalement */
        }

        .login-container input, .login-container button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .login-container input:focus, .login-container button:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .login-container input {
            background-color: #f9f9f9;
        }

        .login-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            font-size: 18px;
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        .login-container a {
            display: inline-block;
            text-align: center;
            color: #4CAF50;
            text-decoration: none;
            margin-top: 10px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .login-container .reset-button {
            background-color: #f44336; /* Rouge */
            color: white;
        }

        .login-container .reset-button:hover {
            background-color: #e53935; /* Rouge foncé au survol */
        }

        .error-message {
            color: #f44336;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">

        <img src="images\cnx.jpg" alt="Icône utilisateur"> 
        
        <h2>Créer un compte</h2>

       
        <?php if ($message): ?>
            <div class="error-message"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Rediriger si l'utilisateur n'est pas connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('logo1.jpg'); /* Remplacez par le chemin de votre image */
            background-size: cover; /* Recouvre toute la page */
            background-position: center center; /* Centre l'image */
            background-attachment: fixed; /* L'image reste fixe pendant le défilement */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: white; /* Texte en blanc pour contraster avec l'arrière-plan */
        }

        .welcome-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fond légèrement transparent */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            color:rgb(224, 161, 196);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #fff;
            background-color:rgb(248, 172, 200);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color:rgb(227, 179, 201);
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>Bienvenue, <?php echo $_SESSION['username']; ?>!</h2>
        <a href="logout.php">Se déconnecter</a>
    </div>
</body>
</html>

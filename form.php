<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $projet = htmlspecialchars($_POST['projet']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'votreemail';
    $subject = "Nouvelle demande de contact depuis le site ByWeb";
    $body = "
        <h1>Nouvelle demande de contact</h1>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Prénom :</strong> $prenom</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Projet choisi :</strong> $projet</p>
        <p><strong>Message :</strong></p>
        <p>$message</p>
    ";
    $headers = "From: contact@byweb.fr\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        $confirmation = "Votre message a été envoyé avec succès. Nous vous répondrons bientôt.";
    } else {
        $confirmation = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre nos équipes</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #333;
        }
        header {
            background-color: #4e54c8;
            color: white;
            text-align: center;
            padding: 20px 10px;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .container {
            max-width: 500px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #4e54c8;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, textarea, select {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9em;
            box-sizing: border-box;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #4e54c8;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: calc(100% - 20px);
            margin: 0 auto;
        }
        button:hover {
            background-color: #3b3ec4;
        }
        .confirmation {
            text-align: center;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Rejoindre nos équipes</h1>
    </header>
    <div class="container">
        <?php if (isset($confirmation)) : ?>
            <div class="confirmation"><?php echo $confirmation; ?></div>
        <?php endif; ?>
        <h2>Contactez-nous</h2>
        <form method="POST" action="">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

            <label for="projet">Choisissez un projet :</label>
            <select id="projet" name="projet" required>
                <option value="ByHub">ByHub</option>
                <option value="Tasks">Tasks</option>
                <option value="CantineConnect">CantineConnect</option>
                <option value="DreamShare">DreamShare</option>
                <option value="LNCloud">LNCloud</option>
                <option value="Civix">Civix</option>
            </select>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" placeholder="Entrez votre message ici..." required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>

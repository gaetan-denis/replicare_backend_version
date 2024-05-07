<?php

$connection = connection();
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $insertUser = $connection->prepare("INSERT INTO users (users_username, users_password, users_email) VALUES (?, ?, ?)");
        $insertUser->execute([$username, $password, $email]);

    } else {
        echo "<p class='error'>"."L'email n'est pas valide"."</p>";
    }

    $count = $insertUser->rowCount();
    if ($count > 0) {
        echo "<p class='success'>Votre enregistrement s'est effectué avec succès"."</p>";
    } else {
        echo "<p class='error'>"."Erreur lors de l'enregistrement"."</p>";
    }

} else {
    echo "<p class='error'>". "Veuillez remplir tous les champs" ."</p>". "<br>" . "<a href='index.php?view=view/register'>Réessayer</a>";
}
<?php

$connection = connection();
if (!empty($_POST['username'])&& !empty($_POST['password']) && !empty($_POST[('confirmPassword')]) && !empty($_POST['email'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = trim($_POST['confirmPassword']);
    $email = $_POST['email'];

    if (strlen($username) < 3) {

        echo "<p class='error'>" . "Le nom d\'utilisateur doit contenir au minimum 3 caractères" . "</p>";
        exit;

    } elseif (strlen($username) > 30) {

        echo "<p class='error'>" . "Le nom d\'utilisateur doit contenir un maximum de 30 caractères" . "</p>";
        exit;

    } else {

        $username = htmlspecialchars($username);

        if ($password !== $confirmPassword) {
            echo "<p class='error'>" . "Les deux mots de passe doivent être identiques" . "</p>";
            exit;
        } else { if (!preg_match('/^.{8,}$/',$password)) {
            echo '<p class=error>'.'le mot de passe doit être d\'une longueur minimum de 8 caractères'.'</p>';

            } elseif (!preg_match('/[a-z]/', $password)) {
                echo '<p class=error>'.'le mot de passe doit contenir au moins une lettre minuscule'.'</p>';
                exit;
            } elseif (!preg_match('/[A-Z]/', $password)) {
                echo '<p class=error>'.'le mot de passe doit contenir au moins une lettre majuscule'.'</p>';
                exit;
            } elseif (!preg_match('/[0-9]/', $password)) {
                echo '<p class=error>'.'le mot de passe doit contenir au moins un chiffre'.'</p>';
                exit;
            } elseif (!preg_match('/[!@#$%^&*]/', $password)) {
                echo '<p class=error>'.'le mot de passe doit contenir au moins l\'un des caractères spéciaux suivant : !@#$%^&*'.'</p>';
                exit;
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p class='error'>" . "Le mail doit être un format valide" . "</p>";
                    exit;
                } else {
                    $email = htmlspecialchars($email);

                    $insertUser = $connection->prepare("INSERT INTO users (users_username, users_password, users_email) VALUES (?, ?, ?)");
                    $insertUser->execute([$username, $password, $email]);
                    $count = $insertUser->rowCount();
                    if ($count != 1) {
                        echo "<p class='error'>" . "Erreur lors de l'enregistrement" . "</p>";
                        exit;
                    } else {
                        echo "<p class='success'>Votre enregistrement s'est effectué avec succès" . "</p>";
                    }
                }
            }

        }
    }
} else {
    echo "<p class='error'>" . "Veuillez remplir tous les champs" . "</p>" . "<br>" . "<a href='index.php?view=view/register'>Réessayer</a>";
}
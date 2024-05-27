<?php

$connection = connection();

if (isset($_POST['submitButton'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        $sql = 'SELECT * FROM users WHERE users_username = ?';
        $getUser = $connection->prepare($sql);
        $getUser->execute([$username]);
        if ($getUser->rowCount() > 0) {
            $user = $getUser->fetch();
            if (password_verify($password, $user['users_password'])) {
                echo '<p class="success-message">' . 'Vous êtes connecté' . '</p>';
                $_SESSION['username'] = $user['users_username'];
                $_SESSION['password'] = $user['users_password'];
                $_SESSION['id'] = $user['users_id'];
                $_SESSION['created_at'] = $user['users_created_at'];

                date_default_timezone_set('Europe/Paris');
                $currentime = date('Y-m-d H:i:s');
                $sql = 'UPDATE users SET users_last_login=? WHERE users_id=?';
                $connection->prepare($sql)->execute([$currentime, $_SESSION['id']]);
                $_SESSION['last_login'] = $user['users_last_login'];
                header('Location: index.php');
            } else {
                echo '<p class="error-message">' . 'mot de passe incorrect' . '</p>';;
            }
        } else {
            echo '<p class="error-message">' . 'Nom d\'utilisateur et/ou mot de passe inconnu(s) dans la base de données' . '</p>';
        }
    } else {
        echo '<p class="error-message">' . 'Veuillez remplir tous les champs' . '</p>';
    }
}


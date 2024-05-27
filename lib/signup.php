<?php

require 'lib/validation.php';

$connection = connection();

$errors=[];

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST[('confirmPassword')]) && !empty($_POST['email'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = trim($_POST['confirmPassword']);
    $email = $_POST['email'];

    if ($error=validateUsername($username)){
        $errors[]=$error;
    }
    if($error=validatePassword($password, $confirmPassword)){
        $errors[]=$error;
    }

    if($error=validateEmail($email)){
        $errors[]=$error;
    }

    if(empty($errors)){
        $username=htmlspecialchars($username);
        $password=password_hash($password, PASSWORD_DEFAULT);
        $email=htmlspecialchars($email);

        $insertUser = $connection->prepare("INSERT INTO users (users_username, users_password, users_email,users_created_at) VALUES (?, ?, ?,NOW())");
                    $insertUser->execute([$username, $password, $email,]);
                    $count = $insertUser->rowCount();
                    if ($count != 1) {
                        $error[]= 'Erreur lors de l\'enregistrement';
                    } else {

                        echo '<p class="success-message">'.'Votre enregistrement s’est effectué avec succès'. '</p>';
                    }
    }

}else{
    $errors[]='Veuillez remplir tous les champs';
}

displayErrors($errors);

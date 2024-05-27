<?php
/**
 * @param $username
 * @return string|null
 */
function validateUsername($username)
{
    if (strlen($username) < 3) {

        return "Le nom d\'utilisateur doit contenir au minimum 3 caractères";

    } elseif (strlen($username) > 30) {

        return "Le nom d\'utilisateur doit contenir un maximum de 30 caractères";

    } else {

        return null;

    }
}

/**
 * @param $password
 * @param $confirmPassword
 * @return string|null
 */
function validatePassword($password, $confirmPassword)
{
    if ($password !== $confirmPassword) {

        return 'Les deux mots de passe doivent être identiques';

    } else {
        if (!preg_match('/^.{8,}$/', $password)) {

            return 'le mot de passe doit être d\'une longueur minimum de 8 caractères';

        } elseif (!preg_match('/[a-z]/', $password)) {

            return 'le mot de passe doit contenir au moins une lettre minuscule';

        } elseif (!preg_match('/[A-Z]/', $password)) {

            return 'le mot de passe doit contenir au moins une lettre majuscule';

        } elseif (!preg_match('/[0-9]/', $password)) {

            return 'le mot de passe doit contenir au moins un chiffre';

        } elseif (!preg_match('/[!@#$%^&*]/', $password)) {

            return 'le mot de passe doit contenir au moins l\'un des caractères spéciaux suivant : !@#$%^&*';

        } else {

            return null;
        }
    }
}

/**
 * @param $email
 * @return string|null
 */
function validateEmail($email)
{

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        return 'Le mail doit être un format valide';

    } else {

        return null;
    }
}

/**
 * @param $errors
 * @return void|null
 */
function displayErrors($errors)
{
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="error" role="alert">' . $error . '</div>';
        }
        echo "<br><a href='index.php?view=view/signup'>Réessayer</a>";
    } else {
        return null;
    }
}


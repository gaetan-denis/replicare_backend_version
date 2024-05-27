<nav>
    <ul>
        <li><a href="index.php?view=view/home">accueil</a></li>
        <li><a href="index.php?view=view/forum">forum</a></li>

        <?php
        if(!$_SESSION){
            echo '<li>'.'<a href="index.php?view=view/login">'.'Se Connecter'.'</a>'.'</li>';
        }else{
            echo '<li>'.'<a href="index.php?view=view/profile">'.'Profil'.'</a>'.'</li>';
            echo '<li>'.'<a href="index.php?view=lib/logout">'.'Se Déconnecter'.'</a>'.'</li>';
        }
        ?>
<!--        <li><a href="index.php?view=view/login">se connecter</a></li>-->

    </ul>
</nav>
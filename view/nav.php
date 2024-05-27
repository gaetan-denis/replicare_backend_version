<nav>
    <ul>
        <li><a href="index.php?view=view/home">accueil</a></li>
        <li><a href="index.php?view=view/forum">forum</a></li>

        <?php
        if(!$_SESSION){
            echo '<li>'.'<a href="index.php?view=view/login">'.'se connecter'.'</a>'.'</li>';
        }else{
            echo '<li>'.'<a href="index.php?view=view/profile">'.'profil'.'</a>'.'</li>';
            echo '<li>'.'<a href="index.php?view=lib/logout">'.'Ss déconnecter'.'</a>'.'</li>';
        }
        ?>
<!--        <li><a href="index.php?view=view/login">se connecter</a></li>-->

    </ul>
</nav>
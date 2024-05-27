<h2>Profil</h2>


<ul>
    <li>Votre identifiant de session: <?php echo $_SESSION['id'] ?></li>
    <li>Votre nom d’utilisateur: <?php echo $_SESSION['username'] ?></li>
    <li>
        <?php

        $dateTime = $_SESSION['created_at'];


        $timestamp = strtotime($dateTime);

        $date = date('d/m/Y', $timestamp);
        $heure = date('H:i', $timestamp);

        echo "Membre depuis le : $date à $heure";

        ?>
    </li>
    <li>
        <?php

        $dateTime = $_SESSION['last_login'];


        $timestamp = strtotime($dateTime);

        $date = date('d/m/Y', $timestamp);
        $heure = date('H:i', $timestamp);

       echo 'Dernière connexion le  : ' .$date. ' à : '. $heure;

        ?>
    </li>
</ul>





<?php

/**
 * @param string $content
 * @return void
 */

function getContent(string $content): void
{
    if (is_array(FILE_EXT)) {
        foreach (FILE_EXT as $extension) {
            $filename = $content . '.' . $extension;
            if (file_exists($filename)) {
                include_once $filename;
            }
        }
    }
}

/**
 * @return void
 */

function connectionStatus(){
    global $connection;
    if($connection instanceof PDOException){
        echo "<div class='error-message'>"."Erreur pendant la tentative de connexion: ".$connection->getMessage()."</div>";
    }else {
        echo "<div class='success-message'>"."La connexion s'est effectuée avec succès"."</div>";
    }

    require_once 'view/nav.php';
}

/**
 * @return void
 */
function sessionCheck(){
    if(isset($_SESSION['id'])){
        echo 'Bonjour '.$_SESSION['username'].'<br>';
    }else{
        echo 'Bonjour Visiteur';
    }
}
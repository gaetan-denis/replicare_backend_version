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
        echo "<p class='error'>"."Erreur pendant la tentative de connexion: ".$connection->getMessage()."</p>";
    }else {
        echo "<p class='success'>"."La connexion s'est effectuée avec succès"."</p>";
    }

    require_once 'view/nav.html';
}


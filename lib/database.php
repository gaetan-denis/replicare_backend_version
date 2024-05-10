<?php

/**
 * @return PDO|PDOException
 */
function connection() : PDO|PDOException
{
    try{
        $dbh=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);

        return $dbh;
    }catch(PDOException $e){

        return $e;
    }
}
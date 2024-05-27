<?php

/**
 * @return PDO|PDOException
 */
function connection() : PDO|PDOException
{
    try{
        return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
    }catch(PDOException $e){

        return $e;
    }
}
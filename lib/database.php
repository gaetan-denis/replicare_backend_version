<?php

/**
 * @return PDO|PDOException
 */
function connection() : PDO|PDOException
{
    try{
        $dbh=new PDO("mysql:host=localhost;dbname=test_php","root","");

        return $dbh;
    }catch(PDOException $e){

        return $e;
    }
}
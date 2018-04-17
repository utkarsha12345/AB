<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "nandan50");
    define("DB_DATABASE", "");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,"");

    if($db == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
    $sql = "CREATE DATABASE IF NOT EXISTS useraccounts";
    
    if(mysqli_query($db, $sql)){
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
 
    mysqli_select_db($db,"useraccounts");

$query = "CREATE TABLE USERS (
                          
                          EMAIL varchar(255) NOT NULL,
                          PASSWORD varchar(255) NOT NULL,
                          USERNAME varchar(255) NOT NULL,
                          ADDRESS varchar(255) NOT NULL,
                          PHONE bigint(20),
                          PRIMARY KEY  (USERNAME)
                          )";
                $result = mysqli_query($db, $query);
?>
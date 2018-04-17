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

    
    $Username = $_POST['uname'];
    $Password = $_POST['pass'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Phone = $_POST['phno'];
    
    $sql1 = "INSERT INTO users (EMAIL, PASSWORD, USERNAME,ADDRESS,PHONE) VALUES ('$Email', '$Password' , '$Username' , '$Address' , $Phone)";  
    mysqli_query($db, $sql1);
    mysqli_close($db);

    echo '<script type="text/javascript">alert("Registered Successfully");
    window.location.href="Rlogin.htm";
    </script>';
    
    
?>


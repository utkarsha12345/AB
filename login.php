<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "nandan50");
    define("DB_DATABASE", "");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,"");

    if($db == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  
    mysqli_select_db($db,"useraccounts");

    
    $Username = $_POST['uname'];
    $Password = $_POST['pass'];
    
    $sql1 = "SELECT PASSWORD FROM users where USERNAME = '$Username' ";  
    
    if($result = mysqli_query($db, $sql1)){
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $DbPassword = $row['PASSWORD'];
    if($DbPassword == $Password){
    echo '<script type="text/javascript">alert("Login successful!");
    window.location.href="Base.htm";
    </script>';
    }
    else{
    echo '<script type="text/javascript">alert("Wrong Password!");
    window.location.href="Rlogin.htm";
    </script>';
    }
    }
    else{
    echo '<script type="text/javascript">alert("User does not exist!");
    window.location.href="Rlogin.htm";
    </script>';
    }
    
    }
    mysqli_free_result($result);

    mysqli_close($db);
        
?>


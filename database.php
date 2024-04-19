<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "ecs417";
    
    try{
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception) {
        echo "Could not connect!";
    }

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
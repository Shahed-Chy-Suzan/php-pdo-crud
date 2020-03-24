<?php
    // $connection = mysqli_connect("host",'db_user','db_pass','db_name');

    session_start();

    $dns        = "mysql:host=localhost;dbname=s5-crud";
    $username   = 'root';
    $password   = "";
    $message    = "";       // $options    = [];

    try {
        $connection = new PDO($dns,$username,$password);  //options
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "We are connected";

    }
    catch (PDOException $e) {
        $message = $e->getMessage();
    }

?>

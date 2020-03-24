<!-- Database Connection File -->
<?php
    include("db.php");
    
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="bs4/bootstrap.css">
    <link rel="stylesheet" href="bs4/style.css">

    <title>S5-CRUD</title>
</head>
<body>

               <!------------- NAVIGATION ---------->
    <nav class="navbar navbar-dark navbar-expand-md">
      <div class="container">
        <a class="navbar-brand" href="index.php">CRUD-PDO</a>
           <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav m-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">INDEX</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="create-data.php">CREATE/ADD</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">LogIn</a>
                </li>
              </ul>
            </div>
      </div>
    </nav>
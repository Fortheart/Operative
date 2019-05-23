<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="style/headerStyle.css">-->
    <link rel="stylesheet" href="style/headerStyleGrid.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header>
    
  
<img class="logo" src="Design/Logo.png" alt="Operative">
  
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <label for="nav-toggle" class="nav-toggle-label">
        <span></span>
    </label>
    <nav> 
    <ul>
    <li><a href="index.php" id="home">Domů</a></li>
    <li><a href="index.php#nabidka">Přehled aut</a></li>
    <li><a href="#">Kontakt</a></li>

    <?php
    if(isset($_SESSION['email'])){ 
     //   echo 'id uživatele:'.$_SESSION['id'];
       // echo 'email:'.$_SESSION['email'];?> 
       <li><a href="administrationCars.php">správa aut</a></li>
       <form action="codes/logout.code.php" method="post">
      <li><a><button class="signOut" type="submit" name="logout-submit">logout</button></a></li>
        </form>
    <?php } 
    else{
    ?>
    <li><a href="login.php" class="signIn">Přihlásit se</a></li>
    <?php } ?>


    </ul>
    </nav>
   
    <script src="headerScript.js"></script>

    </header>
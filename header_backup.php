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
    <div class="header">
    <nav>
    <a href="index.php">
    <img class="logo" src="Design/Logo.png" alt="Operative">
    </a>
    <ul>
    <li><a href="index.php" id="home">Home</a></li>
    <li><a href="index.php#nabidka">Přehled aut</a></li>
    <li><a href="#">Kontakt</a></li>
    <span>|</span>
  
    <?php
    if(isset($_SESSION['email'])){ 
     //   echo 'id uživatele:'.$_SESSION['id'];
       // echo 'email:'.$_SESSION['email'];?> 
       <a href="administration.php">správa aut</a>
       <form action="codes/logout.code.php" method="post">
        <button class="signOut" type="submit" name="logout-submit">Logout</button>
        </form>
    <?php } 
    else{
    ?>
    <a href="login.php" class="signIn">Přihlásit se</a>
    <?php } ?>

    </ul>
    </nav>
    </div>
    <script src="headerScript.js"></script>

</header>
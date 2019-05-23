<?php require 'header.php';?>
        <link rel="stylesheet" href="style/loginStyle.css">

        <form action="codes/login.code.php" method="post">
        <h1 class="headline">Přihlášení</h1>
        <input type="text" name="email" placeholder="E-mail" class="emailInput">
        <br>
        <input type="password" name="password" placeholder="Password" class="passwordInput">
        <br>
        <button type="submit" name="login-submit" class="submitButton">Login</button>
        <br>
        <span class="secondButton">Ještě nemám účet </span><a href="signup.php" class="secondButton">Registrovat se</a>
        </form>
      

<div class="spacer"></div>
<?php require 'footer.php'?>
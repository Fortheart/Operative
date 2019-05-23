<?php require 'header.php';

?>
 <link rel="stylesheet" href="style/loginStyle.css">
<main>
<div class="wrapper-main">
<section class="section-default">

<form action="codes/signup.code.php" method="post">  <!-- Form při submitu otevírá script signup.code.php -->
<h1 class="headline">Registrace</h1>
<input type="text" name="name" placeholder="Name">
<input type="text" name="surname" placeholder="Surname">
<input type="text" name="email" placeholder="Email" >
<input type="password" name="password" placeholder="Password" >
<br>
<button type="submit" name="signup-submit" class="submitButton">Signup</button>  <!-- Určuje, že po stistknutí se provede submit-->
<br>
<span class="secondButton">Již mám účet </span><a href="login.php" class="secondButton">Přihlásit se</a>
</form>
</section>
</div>
</main>
<div class="spacer"></div>
<?php
require 'footer.php';
?>
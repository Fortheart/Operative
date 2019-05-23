<?php 
session_start();
require 'codes/db.code.php';
//require 'header.php';
?>
<body>
<ul>
<li><a href="administration.php">Správa účtu</a></li>
<li><a href="administrationCars.php">správa aut</a></li>
</ul>

<?php

$sql = "SELECT * FROM OwnedCars;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck >0){
    if($row = mysqli_fetch_assoc($result)){
        
        if($_SESSION['id'] == $row['id_user']){
            
            echo 'Name '.$_SESSION['name']. '<br>';
            echo 'Surname '.$_SESSION['surname']. '<br>';;
            echo 'Email '.$_SESSION['email']. '<br>';;
         }
        
        }
        
    }
?>
<?php
require 'footer.php';

    ?>

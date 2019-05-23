<?php
session_start();

require 'header.php'; 
require 'codes/db.code.php';
?>
<body>
<link rel="stylesheet" href="style/style.css">
<img class="banner" src="Design/headerImage.png" alt="">
<main>

<h1 id="nabidka">Nabídka Aut</h1>
<hr class="underlineH1">
<span></span>

<?php 
/*if (isset($_SESSION['email'])) {
   echo "<p>You are logged in!</p>";
}
else{
echo "<p>You are logged out!</p>";
}*/
?>



<?php
$sql = "SELECT * FROM Cars;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck >0):
    while($row = mysqli_fetch_assoc($result)):
        ?>
        <div class="thumbnail">
       
        <?php
        
    echo '<img class="carImage" src=pictures/'.$row['picture'].' alt="image">';   
    echo '<h4>'.$row['carName'].'</h4>';
    echo'<div class="allParams"> <span class="parameter"><img src="Design/pistons.svg" alt="objem" class="icon"><p> '.$row['engineSize'].'</p></span>';
    echo '<span class="parameter"><img src="Design/engine.svg" alt="výkon" class="icon"><p> '.$row['power'].'</p></span>';
    echo'<span class="parameter"><img src="Design/fuel-station.svg" alt="palivo" class="icon"><p> '.$row['fuel'].'</p></span>';
    echo '<span class="parameter"><img src="Design/manual-transmission.svg" alt="převodovka" class="icon"><p> '.$row['gearSelector'].'</p></span>';
    echo '<span class="parameter"><img src="Design/settings.svg" alt="náhon" class="icon"><p> '.$row['drive'].'</p></span>';
    echo '<span class="parameter"><img src="Design/palette.svg" alt="barva" class="icon"><p> '.$row['color'].'</p></span></div><hr>';
    echo '<div class="priceDetail"><p class="price">'.$row['price'].' ,-</p>';
    echo '<a class="detailButton" href="detail.php?id='.$row['id_car'].'">DETAIL</a></div>';
    ?>
  
        </div>
<?php
endwhile;
endif;
?>
</main>

<?php
require 'footer.php';
?>
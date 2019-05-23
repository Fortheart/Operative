<?php
session_start();
require 'header.php';
require 'codes/db.code.php';



$sql = 'SELECT * FROM Cars';
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$getId = $_GET['id'];
$_SESSION['id_car'] = $getId;

if ($resultCheck >0):
    while($row = mysqli_fetch_assoc($result)):
        ?>
                <link rel="stylesheet" href="style/detailStyle.css">
          
            <div class="pageContent">

        <?php
        if($getId == $row['id_car']){    
    echo '<div class="thumbnail"><div class="thumbnailText"><h4 class="carName">'.$row['carName'].'</h4>';
    echo '<p class="price"><span> měsíční splátka: </span><span class="priceNumber">'.$row['price'].' Kč</span></p>';
    echo '<a href="codes/order.code.php?id='.$row['id_car'].'">Pronájem</a>';
    echo '<span class="carParameters"><p>'.$row['engineSize'].'</p>';
    echo '<p>'.$row['power'].'</p>';
    echo '<p>'.$row['fuel'].'</p>';
    echo '<p>'.$row['gearSelector'].'</p>';
    echo '<p>'.$row['drive'].'</p>';
    echo '<p>'.$row['color'].'</p></span></div>';
    echo '<div class="carImage"><img class="carImage" src=pictures/'.$row['picture'].' alt="image">
         </div></div>';   
 
echo '<p class="carInfo">'.$row['carInfo'].'</p>';
        }


endwhile;

endif;

require 'footer.php';
    ?>
    </div>
</body>
</html>
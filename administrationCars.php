<?php
session_start();
require "codes/db.code.php";
require "header.php";
?>
<body>
    <link rel="stylesheet" href="style/administrationCarsStyle.css">
    <div class="spacer"></div>

<?php
$sql = "SELECT * FROM OwnedCars";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['id_user'] == $_SESSION['id']){
       // echo   '<br>'.$row['car_id'];
     $sqlCars = "SELECT * FROM Cars;";
     $resultCars = mysqli_query($conn, $sqlCars);
     $resultCheckCars = mysqli_num_rows($resultCars);
     if($resultCheckCars > 0){
        while($rowCars = mysqli_fetch_assoc($resultCars)){
            if($row['car_id'] == $rowCars['id_car']){
                
                
                echo '<div class="oneCar">
                     <img class="carImage" src=pictures/'.$rowCars['picture'].' alt="image">';
                echo '<div class="oneCarTextBlock">'; 
                echo '<h1>'.$rowCars['carName'].'</h1>';
                echo '<p class="price">'.$rowCars['price'].' Kč/měsíc</p>';
                echo '<div class="carParams">
                      <p>'.$rowCars['engineSize'].'</p>';
                echo '<p>'.$rowCars['power'].'</p>';
                echo '<p>'.$rowCars['fuel'].'</p>';
                echo '<p>'.$rowCars['gearSelector'].'</p>';
                echo '<p>'.$rowCars['drive'].'</p>';
                echo '<p>'.$rowCars['color'].'</p></span></div></div></div></div>';
            }
        }
    }
}
    }
}
?>
<img src="" alt="">
<?php

session_start();
require 'db.code.php';


if(isset($_SESSION['id_car'])){
   // echo 'id auta:'. $_SESSION['id_car'];
    //echo '<br> success';
    
    if(isset($_SESSION['email'])){ 
        //echo $_SESSION['email'];

        $userId = $_SESSION['id'];
        $carId = $_SESSION['id_car'];

        //$postUserId = $_POST[$userId];
        //$postCarId = $_POST[$carId];

        //echo '<br>userId ='.$userId.'<br>carId ='. $carId;
        $sql = "INSERT INTO OwnedCars (id_user,car_id) VALUES ($userId, $carId)";
        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
    
           header("Location: ../index.php?order=success");
           exit();
        }
        //$stmt = mysqli_stmt_init($conn);   
        //mysqli_stmt_execute($stmt);
    }
    else{
        ?> 


                <link rel="stylesheet" href="../style/headerStyleGrid.css">
                <link rel="stylesheet" href="../style/orderStyle.css">
                <div class="orderContent"> 
                <img src="../Design/noFace.png" class="noFace">
            <br><h1>Nelze objednávat auto bez přihlášení <a href="../login.php">Přihlásit se</a>
                <br>Ještě nemám účet <a href=../signup.php>Vytvořit účet</a></h1>
                </div>
                </body>
                <?php

    }
}
else{
echo '<h1> Ooops, something with your order went wrong :( </h1>';
}
?>

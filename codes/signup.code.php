<?php
if(isset($_POST['signup-submit'])){  //kontroluje jestli se do scriptu uživatel dostal náhodou, nebo stisknutím tlačítka registrace

    require 'db.code.php';

     $name = $_POST['name'];  // přebere proměnnou z formu ze signup.php a vytvoří pro ní metodu post
     $surname = $_POST['surname'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     //VALIDACE
     if (empty($name) || empty($surname) || empty($email) || empty($password)) {
         header("Location: ../signup.php?error=emptyFields&name=".$name. "&email=".$email); //pokud uživatel nevyplní jedno z polí, tak bude přesměrován zpět na signup.php
         exit(); //vypne script
     }
     else {
            $sql = "Select email FROM Users WHERE email=?"; //? = placeholder který vytváří "prepared statement". Ochrana před SQL injection
                                                            // kdyby místo ? byla přímo proměnná $email, uživatel by mohl do textboxu napsat sql kód, kterým by mohl zničit databázi. 
     
            $stmt = mysqli_stmt_init($conn);                     //prepared statement
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error= sqlerror");
                 exit(); 
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $email); //dosazuji proměnnou místo ? do prepared statement
                mysqli_stmt_execute($stmt);  //přidá do databáze
                mysqli_stmt_store_result($stmt); //fetchuje z databáze
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){

                    header("Location: ../signup.php?error= usertaken");
                    exit();
                }
                else{
    // SUBMIT ÚDAJŮ A ZÁPIS DO DATABÁZE
                    $sql = "INSERT INTO users (name,surname,email,password) VALUES(?,?,?,?)"; 
                    $stmt = mysqli_stmt_init($conn);   
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error= sqlerror");
                         exit(); 
                    }
                    else{
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //hashuje heslo, aby bylo bezpečné

                        mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $email, $hashedPassword); //dosazuji proměnnou místo ? do prepared statement. Místo hesla dosadim $hashedPassword
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                      
                    }
                }
            }
        
        }
        mysqli_stmt_close($stmt); //skript přestane pracovat
        mysqli_close($conn); //připojení k databázi přestane pracovat
}
else{
    header("Location: ../signup.php");
}
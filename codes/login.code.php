<?php
if(isset($_POST['login-submit'])){  //kontroluje jestli se do scriptu uživatel dostal náhodou, nebo stisknutím tlačítka registrace

require 'db.code.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    header("Location: ../login.php?error=emptyFields"); //pokud uživatel nevyplní jedno z polí, tak bude přesměrován zpět na signup.php
    exit(); 
}
else{
    $sql ="SELECT * FROM Users WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?sqlerror");
         exit(); 
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $passwordCheck = password_verify($password, $row['password']);
            if($passwordCheck == false){
                header("Location: ../login.php?error=wrongpassword");
                exit();
            }
            else if($passwordCheck == true){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['email'] = $row['email'];

                header("Location: ../index.php?login=success");
                exit();

            }
            else{
                header("Location: ../login.php?error=wrongpassword");
                exit();
            }

        }
        else{
            header("Location: ../login.php?error=nouser"); 
            exit(); //vypne script
        }
    }
}

}

else{
    header("Location: ../index.php");
    exit();
}
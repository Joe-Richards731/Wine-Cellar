<?php
    session_start(); //starts session for session variables
    array_map ("htmlspecialchars",$_POST); //sanitises input
    include_once("connection.php");
    $stmt1=$conn->prepare("SELECT * FROM tblUsers WHERE Email=:Email");
    $stmt1->bindParam(":Email", $_POST["Email"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $hashed=$row["Password"];
        $attempt=$_POST["Password"];
        if (password_verify($attempt,$hashed)){
            $_SESSION["ID"]=$row["userID"];
            $_SESSION["role"]=$row["role"];
            if ($row["role"] == 1){
                header("location: admin.php");
            }
            else{
                header("location: client.php");
            }
        }
        else{
            echo("invalid password");
        }
           
    }

?>


<?php
    session_start(); //starts session for session variables
    array_map ("htmlspecialchars",$_POST); //sanitises input
    include_once("connection.php");
    $stmt1=$conn->prepare("SELECT * FROM tblUsers WHERE Email=:Email"); //returns the data from the table of the user whose email matches the one input
    $stmt1->bindParam(":Email", $_POST["Email"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $hashed=$row["Password"];
        $attempt=$_POST["Password"];
        if (password_verify($attempt,$hashed)){ //checks if the password entered matches the one in the table
            $_SESSION["ID"]=$row["userID"];
            $_SESSION["role"]=$row["role"];
            if ($row["role"] == 1){  // if the user's role is 1 they're an admin so are sent to admin.php
                header("location: admin.php");
            }
            else{ //otherwise they are a client and are sent to client.php
                header("location: client.php");
            }
        }
        else{
            echo("invalid password");
        }
           
    }

?>


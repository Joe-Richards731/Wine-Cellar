<?php
    header("Location: admin.php");
    include_once("connection.php");

    $stmt1=$conn->prepare("INSERT INTO tblUsers 
    (userID,firstName,surname,title,role,Email,phoneNumber,Password)
    VALUES
    (NULL,:firstName,:surname,:title,:role,:Email,:phoneNumber,:Password)
    ");  // inserts the data from the form into the table to add the new user
    $stmt1->bindParam(":firstName",$_POST["firstname"]);
    $stmt1->bindParam(":surname",$_POST["surname"]);
    $stmt1->bindParam(":title",$_POST["title"]);
    $stmt1->bindParam(":role",$_POST["role"]);
    $stmt1->bindParam(":Email",$_POST["Email"]);
    $stmt1->bindParam(":phoneNumber",$_POST["phonenumber"]);
    $stmt1->bindParam(":Password",password_hash($_POST["Password"],PASSWORD_DEFAULT));
    $stmt1->execute();

    $last_id = $conn->lastInsertId();

    $stmt1=$conn->prepare("INSERT INTO tblCollections
    (collectionID,userID,location)
    VALUES
    (NULL,$last_id,'Chelsea Bridge')
    ");
    $stmt1->execute();
?>
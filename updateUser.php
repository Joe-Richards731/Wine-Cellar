<?php
    header("Location: admin.php");
    include_once("connection.php");
    $stmt1=$conn->prepare("UPDATE tblUsers
    SET firstName = :firstName, surname = :surname, title = :title, Email = :email, phoneNumber = :phoneNumber 
    WHERE userID = :ID
    ");
    $stmt1->bindParam(":ID",$_POST["userID"]);
    $stmt1->bindParam(":firstName",$_POST["firstName"]);
    $stmt1->bindParam(":surname",$_POST["surname"]);
    $stmt1->bindParam(":title",$_POST["title"]);
    $stmt1->bindParam(":email",$_POST["email"]);
    $stmt1->bindParam(":phoneNumber",$_POST["phoneNumber"]);
    $stmt1->execute();
?>
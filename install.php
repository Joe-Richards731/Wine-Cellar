<?php 
    #create variables with server details on
    $servername="localhost";
    $username="root";
    $password="password";

    #create the database
    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS wineCellar";
    $conn->exec($sql);
    $sql="USE wineCellar";
    $conn->exec($sql);
    echo("DB made");

    #create the users table
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblusers;
    CREATE TABLE tblusers
    (UserID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(20) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    title VARCHAR(20) NOT NULL,
    role TINYINT(1) DEFAULT 0,
    Email VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(11) NOT NULL,
    Password VARCHAR(200) NOT NULL);
    ");
    $stmt1->execute();
    echo("user table made")
?>
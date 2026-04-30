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
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblUsers;
    CREATE TABLE tblUsers
    (userID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(20) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    title VARCHAR(20) NOT NULL,
    role TINYINT(1) DEFAULT 0,
    Email VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(11) NOT NULL,
    Password VARCHAR(200) NOT NULL);
    ");
    $stmt1->execute();
    echo("user table made");

    #create the collections table
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblCollections;
    CREATE TABLE tblCollections
    (collectionID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(5) NOT NULL,
    location VARCHAR(100) NOT NULL);
    ");
    $stmt1->execute();
    echo("collections table made");

    #create the collection.wine table
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblCollectionWine;
    CREATE TABLE tblCollectionWine
    (collectionID INT(5) NOT NULL,
    wineID INT(5) NOT NULL,
    quantity INT(5) NOT NULL,
    PRIMARY KEY(collectionID,wineID)
    );
    ");
    $stmt1->execute();
    echo("Collection.Wine table made");

    #create the wines table
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblWines;
    CREATE TABLE tblWines
    (wineID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wineName VARCHAR(50) NOT NULL,
    winery VARCHAR(50) NOT NULL,
    storageMethod VARCHAR(50) NOT NULL,
    region VARCHAR(50) NOT NULL,
    vintage INT(4) NOT NULL);
    ");
    $stmt1->execute();
    echo("wine table made");
?>
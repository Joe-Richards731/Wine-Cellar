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

    #add in some default test data
    $hashedpassword=password_hash("password",PASSWORD_DEFAULT);
    $stmt1=$conn->prepare("INSERT INTO tblusers
    (userID,firstName,surname,title,role,Email,phoneNumber,Password)
    VALUES
    (NULL,'Joe','Bloggs','Mr',1,'JoeBloggs@gmail.com','01234567890',:Password),
    (NULL,'John','Smith','Sir',0,'John_Smith@gmail.com','01234123456',:Password)
    ");
    $stmt1->bindParam(":Password",$hashedpassword);
    $stmt1->execute();

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
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblCollectionWines;
    CREATE TABLE tblCollectionWines
    (collectionID INT(5) NOT NULL,
    wineID INT(5) NOT NULL,
    quantity INT(5) NOT NULL,
    PRIMARY KEY(collectionID,wineID)
    );
    ");
    $stmt1->execute();
    echo("Collection.Wines table made");

    #create the wines table
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblWines;
    CREATE TABLE tblWines
    (wineID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wineName VARCHAR(50) NOT NULL,
    colour VARCHAR(15) NOT NULL,
    storageMethod VARCHAR(50) NOT NULL,
    numberBottles INT(2) NOT NULL,
    region VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    vintage INT(4) NOT NULL,
    ABV INT(2) NOT NULL);
    ");
    $stmt1->execute();
    echo("wine table made");

    #add in some default test data
    $stmt1=$conn->prepare("INSERT INTO tblwines
    (wineID,wineName,colour,storageMethod,numberBottles,region,country,vintage,ABV)
    VALUES
    (NULL,'Chateau Pedesclaux','Red','Bottle',1,'Bordeaux','France',2018,14),
    (NULL,'Cantina Tramin Glarea','White','Case',12,'Alto Adige','Italy',2023,13.5)
    ");
    $stmt1->execute();
?>
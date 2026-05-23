<?php
    header("Location: admin.php");
    include_once("connection.php");

    $stmt1=$conn->prepare("INSERT INTO tblWines 
    (wineID,wineName,colour,storageMethod,numberBottles,region,country,vintage,ABV)
    VALUES
    (NULL,:wineName,:colour,:storageMethod,:numberBottles,:region,:country,:vintage,:ABV)
    ");  // inserts the data from the form into the table to add the new wine
    $stmt1->bindParam(":wineName",$_POST["wineName"]);
    $stmt1->bindParam(":colour",$_POST["colour"]);
    $stmt1->bindParam(":storageMethod",$_POST["storageMethod"]);
    $stmt1->bindParam(":numberBottles",$_POST["numberBottles"]);
    $stmt1->bindParam(":region",$_POST["region"]);
    $stmt1->bindParam(":country",$_POST["country"]);
    $stmt1->bindParam(":vintage",$_POST["vintage"]);
    $stmt1->bindParam(":ABV",$_POST["ABV"]);
    $stmt1->execute();
?>
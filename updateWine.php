<?php
    header("Location: admin.php");
    include_once("connection.php");
    $stmt1=$conn->prepare("UPDATE tblWines
    SET wineName = :wineName, colour = :colour, storageMethod = :storageMethod, volume = :volume, region = :region, vintage = :vintage, ABV = :ABV 
    WHERE wineID = :ID
    ");
    $stmt1->bindParam(":ID",$_POST["wineID"]);
    $stmt1->bindParam(":wineName",$_POST["wineName"]);
    $stmt1->bindParam(":colour",$_POST["colour"]);
    $stmt1->bindParam(":storageMethod",$_POST["storageMethod"]);
    $stmt1->bindParam(":volume",$_POST["volume"]);
    $stmt1->bindParam(":region",$_POST["region"]);
    $stmt1->bindParam(":vintage",$_POST["vintage"]);
    $stmt1->bindParam(":ABV",$_POST["ABV"]);
    $stmt1->execute();
?>
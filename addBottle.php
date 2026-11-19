<?php
    header("Location: editCollection.php");
    session_start();
    include_once("connection.php");
    $stmt1=$conn->prepare("UPDATE tblCollectionWines SET quantity = quantity + 1 WHERE wineID=:wine AND collectionID=:collection "); //increases the value of the quantity by one
    $stmt1->bindParam(":collection",$_SESSION["collection"]);
    $stmt1->bindParam(":wine",$_POST["wine"]);
    $stmt1->execute();
?>
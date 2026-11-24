<?php
    header("Location: editCollection.php");
    session_start();
    include_once("connection.php");
    $stmt1=$conn->prepare("DELETE FROM tblCollectionWines WHERE wineID=:wine AND collectionID=:collection"); //removes the record of this wine in the collection
    $stmt1->bindParam(":collection",$_SESSION["collection"]);
    $stmt1->bindParam(":wine",$_POST["wine"]);
    $stmt1->execute();
?>
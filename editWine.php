<!DOCTYPE HTML>
<html>
<head>
    <title>Change Wine Details</title>
</head>
<body>
    <h3>Edit Details</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT * FROM tblWines WHERE wineID = :ID"); //returns all the info for the selected wine
        $stmt1->bindParam(":ID", $_POST["wine"]);
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo('<form action="updateWine.php" method = "POST"> '); //sends the updated data through to updateWine.php
            echo('<input type="text" name="wineID" hidden value="'.$row["wineID"].'">'); //sends through the wine ID without making an input box
            echo('Name: <input type="text" name="wineName" value="'.$row["wineName"].'"><br>');
            echo('Colour: <input type="text" name="colour" value="'.$row["colour"].'"><br>');
            echo('Storage Method: <input type="text" name="storageMethod" value="'.$row["storageMethod"].'"><br>');
            echo('Volume of Wine: <input type="text" name="volume" value="'.$row["volume"].'"><br>');
            echo('Region: <input type="text" name="region" value="'.$row["region"].'"><br>');
            echo('Country: <input type="text" name="country" value="'.$row["country"].'"><br>');
            echo('Vintage: <input type="number" name="vintage" min="0" max="2026" value="'.$row["vintage"].'"><br>');
            echo('ABV: <input type="number" name="ABV" min="0" max="100" value="'.$row["ABV"].'"><br>');
            echo('<input type="submit" value="Update Details"><br></form>');
        }
        
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
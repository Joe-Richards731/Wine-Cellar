<!DOCTYPE HTML>
<html>
<head>
    <title>Change Wine Details</title>
</head>
<body>
    <h3>Select a Wine</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT wineID, wineName FROM tblwines"); //returns the ids and names of all of the wines
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo( '<form action="editWine.php" method = "POST"> '); //sends the wineID of the wine who's button is clicked through to editUser.php
            echo($row["wineName"]);
            echo('<input type="text" name="wine" hidden value='.$row["wineID"].'>');
            echo('<input type="submit" value="Edit Details"><br></form>');
        }
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
<!DOCTYPE HTML>
<html>
<head>
    <title>Select Collection</title>
</head>
<body>
    <h3>Select a Collection</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT collectionID, tblUsers.firstName as FN, tblUsers.surname as SN FROM tblCollections INNER JOIN tblUsers ON tblCollections.userID = tblUsers.userID");
        //SQL returns the collection ID and first name and surname of the user who owns the collection
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo( '<form action="editCollection.php" method = "POST"> '); //sends the collectionID through to editCollection.php
            echo('<input type="text" name="collection" hidden value='.$row["collectionID"].'>');
            echo($row["FN"]." ".$row["SN"].":");
            echo('<input type="submit" value="Edit Collection"><br></form>');
        }
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
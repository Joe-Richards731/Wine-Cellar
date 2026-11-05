<!DOCTYPE HTML>
<html>
<head>
    <title>Edit Collection</title>
</head>
<body>
    <h3>Edit Collection</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT quantity, tblWines.wineName as wine, tblWines.storageMethod as stored FROM tblCollectionWines INNER JOIN  tblWines ON tblCollectionWines.wineID = tblWines.wineID");
        //SQL returns the quantity of the wine as well as its name and the way its stored
        $stmt1->bindParam(":ID", $_POST["collectionID"]);
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            print_r($row);
        }
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
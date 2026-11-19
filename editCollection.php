<!DOCTYPE HTML>
<html>
<head>
    <title>Edit Collection</title>
</head>
<body>
    <h3>Edit Collection</h3>
    <?php 
        include_once("connection.php");
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); //starts session for session variables
        }
        
        if (!isset($_SESSION["collection"])){
            $_SESSION["collection"]=$_POST["collection"];
        }

        $stmt1=$conn->prepare("SELECT quantity, tblWines.wineName as wine, tblWines.storageMethod as storage, tblWines.wineID as wID
        FROM tblCollectionWines 
        INNER JOIN  tblWines ON tblCollectionWines.wineID = tblWines.wineID 
        WHERE tblCollectionWines.collectionID = :ID");
        //SQL returns the quantity of the wine as well as its name and the way its stored
        $stmt1->bindParam(":ID", $_SESSION["collection"]);  
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo('<form action="addBottle.php" method = "POST"> '); //sends through to add another bottle/case
            echo($row["quantity"]." ".$row["storage"]." of ".$row["wine"]);
            echo('<input type="text" name="wine" hidden value='.$row["wID"].'>');
            echo('<input type="submit" value="+"></form>');

            echo('<form action="subractBottle.php" method = "POST"> '); //sends through to subtract a bottle/case
            echo('<input type="text" name="wine" hidden value='.$row["wID"].'>');
            echo('<input type="submit" value="-"><br></form>');

        }
    ?>

     <a href="admin.php"><button > Back to Home </button></a>

</body>
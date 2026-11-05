<!DOCTYPE HTML>
<html>
<head>
    <title>Change User Details</title>
</head>
<body>
    <h3>Select a User</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT userID, firstName, surname FROM tblusers"); //returns the ids, first names and surnames of all of the users
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo( '<form action="editUser.php" method = "POST"> '); //sends the userID of the user who's button is clicked through to editUser.php
            echo($row["firstName"]." ".$row["surname"]);
            echo('<input type="text" name="user" hidden value='.$row["userID"].'>');
            echo(' <input type="submit" value="Edit Details"><br></form>');
        }
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
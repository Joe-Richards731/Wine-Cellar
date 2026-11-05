<!DOCTYPE HTML>
<html>
<head>
    <title>Change User Details</title>
</head>
<body>
    <h3>Edit Details</h3>
    <?php 
        include_once("connection.php");
        $stmt1=$conn->prepare("SELECT * FROM tblUsers WHERE userID = :ID"); //returns all the info for the selected user
        $stmt1->bindParam(":ID", $_POST["user"]);
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            echo( '<form action="updateUser.php" method = "POST"> '); //sends the updated data through to updateUser.php
            echo('<input type="text" name="userID" hidden value="'.$row["userID"].'">'); //sends through the user ID without making an input box
            echo('Title: <input type="text" name="title" value="'.$row["title"].'"><br>');
            echo('First Name: <input type="text" name="firstName" value="'.$row["firstName"].'"><br>');
            echo('Surname: <input type="text" name="surname" value="'.$row["surname"].'"><br>');
            echo('Email: <input type="text" name="email" value="'.$row["Email"].'"><br>');
            echo('Phone Number: <input type="text" name="phoneNumber" value="'.$row["phoneNumber"].'"><br>');
            echo('<input type="submit" value="Update Details"><br></form>');
        }
        
    ?>

    <a href="admin.php"><button > Back to Home </button></a>

</body>


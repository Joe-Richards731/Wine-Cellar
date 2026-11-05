<!DOCTYPE HTML>
<html>
<head>
    <title>Add Wine</title>
</head>
<body>
<h3>Add Wine</h3>
    <form action="addWine.php" method = "POST"> <!-- The form takes in the data of the new wine and sends it to the addWine.php page -->
        Name: <input type="text" name="wineName" required=True><br>
        Colour: <input type="text" name="colour" required=True><br>
        Storage Method: <input type="text" name="storageMethod" required=True><br>
        Volume of Wine: <input type="number" name="volume" required=True min="1"><br>
        Region: <input type="text" name="region" required=True><br>
        Country: <input type="text" name="country" required=True><br>
        Vintage: <input type="number" name="vintage" required=True min="0" max="2026"><br>
        Percentage Alcohol: <input type="number" name="ABV" required=True min="0" max="99"><br>
        <input type="submit" value="Add wine"><br>
    </form>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
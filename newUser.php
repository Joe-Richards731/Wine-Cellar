<!DOCTYPE HTML>
<html>
<head>
    <title>Add User</title>
</head>
<body>
<h3>Add User</h3>
    <form action="addUser.php" method = "POST"> <!-- The form takes in the data of the new user and sends it to the addUser.php page -->
        Forename: <input type="text" name="firstname" required=True><br>
        Surname: <input type="text" name="surname" required=True><br>
        Title: <input type="text" name="title" required=True><br>
        Role: <br>
        <input type="radio" name="role" value=0 checked>Client
        <input type="radio" name="role" value=1>Admin<br>
        Email: <input type="email" name="Email" required=True><br>
        Phone Number: <input type="text" name="phonenumber" required=True><br>
        Password: <input type="password" name="Password" required=True><br>
        <input type="submit" value="Add user"><br>
    </form>

    <a href="admin.php"><button > Back to Home </button></a>

</body>
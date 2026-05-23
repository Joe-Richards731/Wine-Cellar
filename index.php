<!DOCTYPE HTML>
<html>
<head>
    <title>Log In</title>
</head>

<body>

    <form action="login.php" method = "POST"> <!-- The form takes in the data the user needs to log in and sends it to the login.php page -->
       
        Email: <input type="email" name ="Email" required=True><br>
        Password: <input type="password" name="Password" required=True><br>

        <input type="submit" value="Log in"><br>
    </form>

</body>
</html>
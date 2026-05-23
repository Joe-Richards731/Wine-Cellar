<?php
    session_start();
    session_destroy(); //resets all the session variables so that the  user is no longer logged in
    header("location: index.php");
?>
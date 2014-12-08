<?php
	    session_start();
   unset($_SESSION['username'], $_SESSION['fname'], $_SESSION['lname'], $_SESSION['logged']);
    header("Location: index.html");
?>


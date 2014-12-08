<?php
// from http://www.phpsnips.com/4/Simple-User-Login#.VIOlJn_sPxs
include_once("registration_db.php");
if(!DbConnected()) {
	DbConnect();
}
if(isset($_POST['submit'])) {
    if(VerifyUserDB($_POST['username'],$_POST['password'],$row)) {
	    session_start();
	    $_SESSION['username'] = $row['UserName'];
	    $_SESSION['fname'] = $row['FirstName'];
	    $_SESSION['lname'] = $row['LastName'];
	    $_SESSION['logged'] = TRUE;
	    # header("Location: user_page.php"); // Modify to go to the page you would like
	    header("Location: index.html"); // Modify to go to the page you would like
	    exit;
    } else {
        # header("Location: login_page.php");
        header("Location: index.html");
        exit;
    }
} else {    //If the form button wasn't submitted go to the index page, or login page
    header("Location: index.html");    
    exit;
}
?> 

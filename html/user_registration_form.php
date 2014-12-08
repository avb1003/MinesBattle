<?php
function trace($msg) {
    $trace = debug_backtrace();
        trigger_error(
            $msg." on ".$trace[0]['line'],
            E_USER_NOTICE
	);
}

include_once "registration_db.php";
if(!DbConnected()) {
	DbConnect();
}
if(isset($_POST['submit'])) {
    # mysql_real_escape_string($_POST['user_name']));
    $user_name	= $_POST['user_name'];
    $fname	= $_POST['fname'];
    $lname 	= $_POST['lname'];
    $password	= $_POST['password'];
    $re_password = $_POST['re_password'];
	    trace("about to check user existence");
    if(CheckUserDB(mysql_real_escape_string($user_name))) {
            $error = '<p>User Name already exists<br></p>';
    } else {
	    trace("after  checking user existence");
	if( empty($user_name)
		|| empty($password)
		|| empty($re_password)
		|| $password != $re_password ) {
	    # if a field is empty, or the passwords don't match make a message
		    $error = '<p>';
	    if($user_name) {
		$error .= 'User Name can\'t be empty<br>';
	    }
	    if(empty($password)) {
		$error .= 'Password can\'t be empty<br>';
	    }
	    if(empty($re_password)) {
		$error .= 'You must re-type your password<br>';
	    }
	    if($password != $re_password) {
		$error .= 'Passwords don\'t match<br>';
	    }
		    $error .= '</p>';
		trace("error was found:".$error);
	} else {
        # If all fields are not empty, and the passwords match,
        # create a session, and session variables,
		trace("about to add user to database");
	    $query = AddUserDb( mysql_real_escape_string($user_name),
			mysql_real_escape_string($fname),
			mysql_real_escape_string($lname),
			mysql_real_escape_string($password));
		# Redirect the user to a login page
		trace("after adding user to database");
	    if($query) {
		trace("about to go to login_page.php");
		header("Location: login_page.php");
		exit;
	    }
	}
    	trace("fall through to here");
    }
}
# echo out each variable that was set from above,
# then destroy the variable.
if(isset($error)) {
    echo $error;
    unset($error);
}
?> 
<!-- Start your HTML/CSS/JavaScript here -->
<pre>
<?php trace('_SERVER_PHP_SELF_='.$_SERVER['PHP_SELF'].'=');
while (list($var,$value) = each ($_SERVER)) { echo "$var => $value\n";}
?>
</pre>
<!-- form action="<? echo 'http://localhost'.$_SERVER['PHP_SELF']; ?>" method="post" -->
<form action="#" method="post">
    <p>User Name:<br /><input type="text" name="user_name" 
    	<?
	if(!$row){echo 'value="'.$_POST['user_name'].'"';}
	?>
    </p>
    <p>First Name:<br />
	<input type="text" name="fname" <?
			echo 'value="'.$_POST['fname'].'"';
			?>
    </p>
    <p>Last Name:<br />
    	<input type="text" name="lname" <?
			echo 'value="'.$_POST['lname'].'"';
			?>
    </p>
    <p>Password:<br />
    	<input type="password" name="password" />
    </p>
    <p>Re-Type Password:<br />
    	<input type="password" name="re_password" />
    </p>
    <p><input type="submit" name="submit" value="Sign Up" />
    </p>
</form> 

<?php
include_once "db_pars.php";
 # connect to the database here
    # search the database to see if the user name has been taken or not
function DbConnected() {
	return isset($_SESSION['db_connection']);
}
function DbConnect() {
global $DbHost,$DbUser,$DbPass,$DbName;
$con = mysql_connect($DbHost,$DbUser,$DbPass);
    if (!$con) {
	die('Could not connect: ' . mysql_error($con));
    }
    mysql_select_db($DbName) or die('Could not select database');
    $_SESSION['db_connection'] = $con;
    return 1;
}
function CloseDb() {
    mysql_close($_SESSION['db_connection']);
    unset($_SESSION['db_connection']);
}

	
function CheckUserDB($UserName) {
    $query = sprintf("SELECT * FROM users WHERE UserName='%s' LIMIT 1",
	    $UserName);
    $sql = mysql_query($query);
    $row = mysql_fetch_array($sql);
    #check too see what fields have been left empty, and if the passwords match
    if($row) {
    	return 1;
    } else {
    	return 0;
    }
}
function AddUserDb($UserName,$FirstName,$LastName,$Password) {
        # If all fields are not empty, and the passwords match,
        # create a session, and session variables,
	$query = sprintf("INSERT INTO users(`UserName`
	,	`FirstName`
	,	`LastName`
	,	`Password`)
	VALUES('%s','%s','%s',PASSWORD('%s'))",
		$UserName,$FirstName,$LastName,$Password);
		$sql = mysql_query($query);
	if(!$sql) {
	     die(mysql_error());
	 }
    return 1;
}
function VerifyUserDB($UserName,$Password,&$Row) {
    $sql = mysql_query("SELECT * FROM users 
        WHERE username='".$UserName."' AND
        password=PASSWORD('".$Password."') LIMIT 1");
    if(mysql_num_rows($sql) == 1)
        $Row = mysql_fetch_array($sql);
    else 
    	die(mysql_error());
    return 1;
}

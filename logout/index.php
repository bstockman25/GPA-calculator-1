<?php
    ob_start();
	if(session_id() == '' || !isset($_SESSION)) {
		// session isn't started
		session_start();
	}
//establsih a connection to the database
	//include("../secure/dbConnect.php");	
	$_SESSION['action'] = 'logout';
//insert the information into the user log
//	mysqli_prepare($conn, 'logout-query', 'INSERT INTO user_log (username, ip_address, log_date, action) VALUES ($1, $2, CURRENT_TIMESTAMP, $3)');
//	$result = mysqli_execute($conn, 'logout-query', array($_SESSION['username'], $_SESSION['ip'], $_SESSION['action']));
	$_SESSION['logged'] = false;	
//unset and destroy the session
	session_unset();
	session_destroy();

//redirect the user to the login screen
    //header('Location: Home');
    header( 'Location: http://mygpa.ninja/' );
    ob_flush();
?>
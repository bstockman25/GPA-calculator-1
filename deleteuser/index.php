<?php
    ob_start();
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //echo "<h1>post request</h1>";
        if(isset($_SESSION) || $_SESSION['username'] != '') {
        //if($_SESSION['username'] != '') {
            include(dirname(__DIR__)."/secure/dbConnect.php");

            $cleanUN = $_SESSION['username'];
            //echo "USERNAME:".$cleanUN;
            $stmt = $dbconn->prepare("DELETE FROM User_Students WHERE userID = ?");
            $stmt->bind_param("s", $cleanUN);
            $stmt->execute();
            

            $stmt = $dbconn->prepare("DELETE FROM User_Authentication WHERE userID = ?");
            $stmt->bind_param("s", $cleanUN);
            $stmt->execute();
            $result = $stmt->get_result();

            // Needs to be implemented if User_Classes is implemented
            /*
            $stmt = $dbconn->prepare("DELETE FROM User_Classes WHERE userID = ?");
            $stmt->bind_param("s", $cleanUN);
            $stmt->execute();
            */

            $stmt->close();
            $dbconn->close();
            //echo "Success!";
            $_SESSION['action'] = 'logout';
            //insert the information into the user log
            //	mysqli_prepare($conn, 'logout-query', 'INSERT INTO user_log (username, ip_address, log_date, action) VALUES ($1, $2, CURRENT_TIMESTAMP, $3)');
            //	$result = mysqli_execute($conn, 'logout-query', array($_SESSION['username'], $_SESSION['ip'], $_SESSION['action']));
            $_SESSION['logged'] = false;	
            //unset and destroy the session
            session_unset();
            session_destroy();
        }
    }
    else{
        //echo "<h1>Not a post request!!!!!!!!!!</h1>";
    }
    header( 'Location: http://mygpa.ninja/' );
    ob_flush();

 ?>
<?php
    //Update USER data
    ob_start();
    //error_reporting(E_ALL);
    //ini_set('display_errors', '1');
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
    
    
    // Error page 2100
    //https://demonuts.com/login-and-registration-php/
    if($_SERVER['REQUEST_METHOD']=='POST'){
        // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
        //including the database connection file
        include(dirname(__DIR__)."/secure/dbConnect.php");
        
        
        $cleanFName = htmlspecialchars($_POST['fname']);
        $cleanLName = htmlspecialchars($_POST['lname']);
        $cleanUEmail = htmlspecialchars($_POST['uemail']);

        //check that username and password fields are not empty
        if($cleanFName == NULL){
            //Error 2103 "What is your first name?";
            echo json_encode(array( "status" => "false","message" => "Error 2103") );
            die;
        }
        else if($cleanLName == NULL){
            //Error 2104 echo "What is your last name?";
            echo json_encode(array( "status" => "false","message" => "Error 2104") );
            die;
        }
        else if($cleanUEmail == NULL){
            //Error 2104 echo "What is your email?";
            echo json_encode(array( "status" => "false","message" => "Error 2105") );
            die;
        }
        if($_POST['ugradepoints'] != NULL){
            $cleanGPoints = htmlspecialchars($_POST['ugradepoints']);
        }
        if($_POST['ucredits'] != NULL){
            $cleanCredits = htmlspecialchars($_POST['ucredits']);
        }
        //insert the username into the database - checking that the query does not fail	and that it does not already exist
        //echo"About to check if user exist\n<br>";
        $stmt = $dbconn->prepare("UPDATE User_Students SET lastName=?, firstName=?, email=?, gradePoints=?, credits=? WHERE userID=?");
        $stmt->bind_param("sssdds", $cleanLName, $cleanFName, $cleanUEmail, $cleanGPoints, $cleanCredits, $_SESSION['username']);
        $stmt->execute();
        //$result = mysqli_execute($dbconn, array($cleanUN, $cleanLName, $cleanFName, $cleanUEmail));

        //set session variables
        $_SESSION['firstname'] = $cleanFName;
        $_SESSION['lastname'] = $cleanLName;
        $_SESSION['email'] = $cleanUEmail;
        $_SESSION['gradepoints'] = $cleanGPoints;
        $_SESSION['credits'] = $cleanCredits;
        //echo"Doing Things!\n<br>";
        //insert username, passwordhash, and salt into database

        //log the user info
        //	mysqli_prepare($conn, 'log-query', 'INSERT INTO gpa.log (username, ip_address, log_date, action) VALUES($1, $2, CURRENT_TIMESTAMP, $3)');
        //	$result = mysqli_execute($conn, 'log-query', array($cleanUN, $_SESSION['ip'], $_SESSION['action']));

        //close the connection to the database
        $stmt->close();
        $dbconn->close();
        //echo "Success!";
        //echo json_encode(array( "status" => "true", "message" => $result));
            
        
        //echo '<br><a href="http://mygpa.ninja/">Return to MyGPA home screen</a><br>\n\n';
        header( 'Location: http://mygpa.ninja/#/user' );
        ob_flush();
    }
    else {
        //Error 2106 echo "Wasnt post data";
        echo json_encode(array( "status" => "false","message" => "Error 2106") );
        //die;
        //header( 'Location: http://mygpa.ninja/register/' );
        ob_flush();
    }
        
    
 
 ?>
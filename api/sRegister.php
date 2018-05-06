<?php
    ob_start();
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
        
        $cleanUN = htmlspecialchars($_POST['username']);
        $cleanFName = htmlspecialchars($_POST['fname']);
        $cleanLName = htmlspecialchars($_POST['lname']);
        $cleanUEmail = htmlspecialchars($_POST['uemail']);

        mt_srand();
        $salt = mt_rand();
        $clean_pw = htmlspecialchars($_POST['password']);
        $pwhash = sha1($salt . $clean_pw);

        //check that username and password fields are not empty
        if($cleanUN == NULL){
            //Error 2101 "Username field cannot be empty.";
            echo json_encode(array( "status" => "false","message" => "Error 2101") );
            die;
        }
        else if($clean_pw == NULL){
            //Error 2102 "Password field cannot be empty.";
            echo json_encode(array( "status" => "false","message" => "Error 2102") );
            die;
        }
        else if($cleanFName == NULL){
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
        $cleanGPoints = 0.0;
        $cleanCredits = 0.0;

        //insert the username into the database - checking that the query does not fail	and that it does not already exist
        //echo"About to check if user exist\n<br>";
        $stmt = $dbconn->prepare("INSERT INTO User_Students (userID, lastName, firstName, email, gradePoints, credits) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdd", $cleanUN, $cleanLName, $cleanFName, $cleanUEmail, $cleanGPoints, $cleanCredits);
        $stmt->execute();
        //$result = mysqli_execute($dbconn, array($cleanUN, $cleanLName, $cleanFName, $cleanUEmail));

        $stmt = $dbconn->prepare("INSERT INTO User_Authentication (userID, passwordHash, salt) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $cleanUN, $pwhash, $salt);
        $stmt->execute();
        $result = $stmt->get_result();

        /*
        if(!$result){
            // Error 2159 unable to retrive data from DB or connect
            echo json_encode(array( "status" => "false","message" => "Error 2159") );
            mysqli_close($dbconn);
            //die;
            //echo "Failed to Execute!\n" . mysqli_last_error();
            //echo "\nReturn to <a href='registration.php'>registration page</a>";
            die;
        }
        */


        //set session variables
        $_SESSION['action'] = 'Register';
        $_SESSION['logged'] = true;
        $_SESSION['authorized'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];	
        $_SESSION['username'] = $cleanUN;
        $_SESSION['firstname'] = $cleanFName;
        $_SESSION['lastname'] = $cleanLName;
        $_SESSION['email'] = $cleanUEmail;
        $_SESSION['gradepoints'] = 0.0;
        $_SESSION['credits'] = 0.0;
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
        header( 'Location: http://mygpa.ninja/register/' );
        ob_flush();
    }
        
    
 
 ?>
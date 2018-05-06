<?php
    // This is pure test code you can run this directly from your console or 
    // simply call the url to make sure that you are connecting with the db
    // deleteUser.php will delete this user. 
    // Once again this is just test code to make sure you have everything working correctly 
    include(dirname(__DIR__)."/secure/dbConnect.php");
    
    if ($dbconn->connect_error) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        exit();
    } 
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
    // Error page 2100
    //https://demonuts.com/login-and-registration-php/

    
    $cleanUN = "uTest1";
    $cleanFName = "User";
    $cleanLName = "Test";
    $cleanUEmail = "uTest1@not.real";
    mt_srand();
    $salt = mt_rand();
    $clean_pw = "123ABC";
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
    //insert the username into the database - checking that the query does not fail	and that it does not already exist
    //echo"About to check if user exist\n<br>";
    $stmt = $dbconn->prepare("INSERT INTO User_Students (userID, lastName, firstName, email) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $cleanUN, $cleanLName, $cleanFName, $cleanUEmail);
    $stmt->execute();
    //$result = mysqli_execute($dbconn, array($cleanUN, $cleanLName, $cleanFName, $cleanUEmail));

    $stmt = $dbconn->prepare("INSERT INTO User_Authentication (userID, passwordHash, salt) VALUES(?, ?, ?)");
    $stmt->bind_param("sss", $cleanUN, $pwhash, $salt);
    $stmt->execute();
    $result = $stmt->get_result();


    
    $stmt->close();
    $dbconn->close();
    //echo "Success!";
    echo json_encode(array( "status" => "true", "message" => $result));
        
    
    echo "\n\n";

 ?>
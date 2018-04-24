<?php
    // Error page 2100
    //https://demonuts.com/login-and-registration-php/
    if($_SERVER['REQUEST_METHOD']=='POST'){
    // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
    //including the database connection file
        include("secure/database.php");
        //include_once("config.php");
        session_start();
        $cleanUN = htmlspecialchars($_POST['username']);
        $cleanFName = htmlspecialchars($_POST['fname']);
        $cleanLName = htmlspecialchars($_POST['lname']);
        //check that username and password fields are not empty
        if($cleanUN == NULL){
            //Error 2101 "Username field cannot be empty.";
            echo json_encode(array( "status" => "false","message" => "Error 2101") );
            die;
        }
        else if($_POST['password'] == NULL){
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
        //insert the username into the database - checking that the query does not fail	and that it does not already exist
        //echo"About to check if user exist\n<br>";
        mysqli_prepare($dbconn, 'userinfo-query', 'INSERT INTO gpa.users VALUES($1, $2, $3)');
        $result = mysqli_execute($dbconn, 'userinfo-query', array($cleanUN, $cleanLName, $cleanFName));

        if(!$result){
            // Error 2159 unable to retrive data from DB or connect
            echo json_encode(array( "status" => "false","message" => "Error 2159") );
            mysqli_close($dbconn);
            //die;
            //echo "Failed to Execute!\n" . mysqli_last_error();
            //echo "\nReturn to <a href='registration.php'>registration page</a>";
            die;
        }


        //seed the random number generator and create a random salt
        mt_srand();
        $salt = mt_rand();
        $clean_pw = htmlspecialchars($_POST['password']);

        //hash the concatenation of the salt and the cleaned password
        $pwhash = sha1($salt . $clean_pw);

        //set session variables
        $_SESSION['action'] = 'Register';
        $_SESSION['logged'] = true;
        $_SESSION['authorized'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];	
        $_SESSION['username'] = $cleanUN;
        //echo"Doing Things!\n<br>";
        //insert username, passwordhash, and salt into database
        mysqli_prepare($dbconn, 'insert-query', 'INSERT INTO gpa.user_info VALUES($1, $2, $3)');
        $result = mysqli_execute($dbconn, 'insert-query', array($cleanUN, $pwhash, $salt));

        //log the user info
        //	mysqli_prepare($conn, 'log-query', 'INSERT INTO gpa.log (username, ip_address, log_date, action) VALUES($1, $2, CURRENT_TIMESTAMP, $3)');
        //	$result = mysqli_execute($conn, 'log-query', array($cleanUN, $_SESSION['ip'], $_SESSION['action']));

        //close the connection to the database
        mysqli_close($dbconn);
        //echo "Success!";
        echo json_encode(array( "status" => "true"));
            
        /*$name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hobby= $_POST['hobby'];

            if($name == '' || $username == '' || $password == '' || $hobby == ''){
                echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
            }else{
                    
                $query= "SELECT * FROM registerDemo WHERE username='$username'";
                $result= mysqli_query($con, $query);
                
                if(mysqli_num_rows($result) > 0){  
                    echo json_encode(array( "status" => "false","message" => "Username already exist!") );
                }else{ 
                    $query = "INSERT INTO registerDemo (name,hobby,username,password) VALUES ('$name','$hobby','$username','$password')";
                    if(mysqli_query($con,$query)){
                    
                        $query= "SELECT * FROM registerDemo WHERE username='$username'";
                                $result= mysqli_query($con, $query);
                            $emparray = array();
                                if(mysqli_num_rows($result) > 0){  
                                while ($row = mysqli_fetch_assoc($result)) {
                                            $emparray[] = $row;
                                        }
                                }
                    echo json_encode(array( "status" => "true","message" => "Successfully registered!" , "data" => $emparray) );
                    }else{
                        echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
                }
            }
                    mysqli_close($con);
            }
            } else{
                echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
            }*/
        }
        
    
 
 ?>
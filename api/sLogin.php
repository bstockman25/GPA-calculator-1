<?php
    ob_start();
    // Error page 2000
    ///https://demonuts.com/login-and-registration-php/
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
        //including the database connection file
        include(dirname(__DIR__)."/secure/dbConnect.php");
        //include_once("config.php");
       
        $cleanUN = htmlspecialchars($_POST['username']);
        $cleanPW = htmlspecialchars($_POST['password']);
 	    //$password = $_POST['password'];
 	
        if( $cleanUN == '' || $cleanPW == '' ){
            // Error 2058 Password or user name were missing
            echo json_encode(array( "status" => "false","message" => "Error 2058") );
        }
        else{
            $stmt = $dbconn->prepare('SELECT salt, passwordhash FROM User_Authentication WHERE userid = ?');
            $stmt->bind_param("s", $cleanUN);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if(!$result){
                // Error 2059 unable to retrive data from DB or connect
                echo json_encode(array( "status" => "false","message" => "Error 2059") );
                $stmt->close();
                $dbconn->close();
                die;
            }
            $row = mysqli_fetch_assoc($result);
            //get rid of the space in salt - no idea why it is there!
            $rowSalt = str_replace(' ', '', $row['salt']);
            //hash the user-typed password and the salt retrieved for the user from the database using SHA1
            $localhash = sha1($rowSalt.$cleanPW);
            //close the connection to the database
            
            //compare the two hashes, if they are equivalent, the user can be redirected to home.php, if not the user must try again
            if($localhash != $row['passwordhash']){
                // Error 2060 $localhash and passwordhash didnt match
                /*echo json_encode(array( 
                    "status" => "false",
                    "message" => "Error 2060",
                    array(
                        ///DONT LEAVE IN PRODUCTION CODE!!
                        "User Name Post:" => $_POST['username'],
                        "The local hash:" =>  $localhash,
                        "DB hash" => $row['passwordhash'],
                        "The rowSalt" => $rowSalt,
                        "The row salt" => $row['salt']
                    )
                ) );
                */

                /*echo "User Name:".$_POST['username']."<br>";
                echo "Please Enter Your Login Information Again<br>";
                echo "The local hash:". $localhash."<br>";
                echo "DB hash:".$row['passwordhash']."<br>";
                echo "The rowSalt:".$rowSalt."<br>";
                echo "The row salt:".$row['salt']."<br>";*/
                $stmt->close();
                $dbconn->close();
                header( 'Location: http://mygpa.ninja/#/login' );
                ob_flush();
            }
            else{
                // SUCCESS!!
                //Set the logged in key and the authorized key to true
                $_SESSION['logged'] = true;
                $_SESSION['authorized'] = true;
                //Set the username key to the cleaned username
                $_SESSION['username'] = $cleanUN;	
                //Set the action key to login in order for proper insertion into the database
                $_SESSION['action'] = 'login';
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                
                //echo json_encode(array( "status" => "true"));
                $stmt = $dbconn->prepare('SELECT * FROM User_Students WHERE userid = ?');
                $stmt->bind_param("s", $cleanUN);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = mysqli_fetch_assoc($result);
                $_SESSION['firstname'] = $row['firstName'];
                $_SESSION['lastname'] = $row['lastName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gradepoints'] = $row['gradePoints'];
                $_SESSION['credits'] = $row['credits'];
                $stmt->close();
                $dbconn->close();
                //die;
                header( 'Location: http://mygpa.ninja/#/user' );
                ob_flush();
            }
        }

    }
?>
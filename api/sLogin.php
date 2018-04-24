<?php
    // Error page 2000
    ///https://demonuts.com/login-and-registration-php/
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
    // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
    //including the database connection file
        include("secure/database.php");
        //include_once("config.php");
       
        $cleanUN = htmlspecialchars($_POST['username']);
        $cleanPW = htmlspecialchars($_POST['password']);
 	    //$password = $_POST['password'];
 	
        if( $cleanUN == '' || $cleanPW == '' ){
            // Error 2058 Password or user name were missing
            echo json_encode(array( "status" => "false","message" => "Error 2058") );
        }
        else{
            session_start();
            mysqli_prepare($dbconn, 'auth-query', 'SELECT salt, passwordhash FROM gpa.user_info WHERE userid = $1');
            $result = mysqli_execute($dbconn, 'auth-query', array($cleanUN));
            if(!$result){
                // Error 2059 unable to retrive data from DB or connect
                echo json_encode(array( "status" => "false","message" => "Error 2059") );
                mysqli_close($dbconn);
                die;
            }
            $row = mysqli_fetch_assoc($result);
            //get rid of the space in salt - no idea why it is there!
            $rowSalt = str_replace(' ', '', $row['salt']);
            //hash the user-typed password and the salt retrieved for the user from the database using SHA1
            $localhash = sha1($rowSalt.$cleanPW));
            //close the connection to the database
            mysqli_close($dbconn);
            //compare the two hashes, if they are equivalent, the user can be redirected to home.php, if not the user must try again
            if($localhash != $row['passwordhash']){
                // Error 2060 $localhash and passwordhash didnt match
                echo json_encode(array( 
                    "status" => "false",
                    "message" => "Error 2060",
                    array(
                        /*******DONT LEAVE IN PRODUCTION CODE!!********/
                        "User Name" => $_POST['username'],
                        "The local hash" =>  $localhash,
                        "DB hash" => $row['passwordhash'],
                        "The rowSalt" => $rowSalt,
                        "The row salt" => $row['salt']
                    )
                ) );
                /*echo "User Name:".$_POST['username']."<br>";
                echo "Please Enter Your Login Information Again<br>";
                echo "The local hash:". $localhash."<br>";
                echo "DB hash:".$row['passwordhash']."<br>";
                echo "The rowSalt:".$rowSalt."<br>";
                echo "The row salt:".$row['salt']."<br>";*/

                die;
            }
            else{
                echo json_encode(array( "status" => "true"));
                die;
            }
            //Set the logged in key and the authorized key to true
            $_SESSION['logged'] = true;
            $_SESSION['authorized'] = true;
            //Set the username key to the cleaned username
            $_SESSION['username'] = $cleanUN;	
            //Set the action key to login in order for proper insertion into the database
            $_SESSION['action'] = 'login';
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

            //redirect the user to the home page once a successful login has been completed
            //header('Location: index.php');


            

            /*$query= "SELECT * FROM registerDemo WHERE username='$username' AND password='$password'";
                $result= mysqli_query($con, $query);
            
                if(mysqli_num_rows($result) > 0){  
                $query= "SELECT * FROM registerDemo WHERE username='$username' AND password='$password'";
                            $result= mysqli_query($con, $query);
                        $emparray = array();
                            if(mysqli_num_rows($result) > 0){  
                            while ($row = mysqli_fetch_assoc($result)) {
                                        $emparray[] = $row;
                                    }
                            }
                echo json_encode(array( "status" => "true","message" => "Login successfully!", "data" => $emparray) );
                }else{ 
                    echo json_encode(array( "status" => "false","message" => "Invalid username or password!") );
                }
                mysqli_close($con);
        }
        } else{
                echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
        }*/
    }
?>
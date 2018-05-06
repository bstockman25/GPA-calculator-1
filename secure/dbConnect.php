<?php
    include "database.php";
    $dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        /*************DONT LEAVE THIS LIKE THIS IN PRODUCTION!!!!!!*****************/
        //or die("Could not connect: " .mysqli_error()."<br>\nhost = $dbhost<br>\ndbname = $dbname<br>\npassword = $dbpass<br>\nuser = $dbuser"
    //);
?>

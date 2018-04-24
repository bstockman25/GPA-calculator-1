<?php
    include "database.php";
    $dbconn = mysqli_connect("host=$dbhost dbname=$dbname password=$dbpass user=$dbuser")
        /*************DONT LEAVE THIS LIKE THIS IN PRODUCTION!!!!!!*****************/
        or die("Could not connect: " .mysqli_error()."<br>\nhost = $dbhost<br>\ndbname = $dbname<br>\npassword = $dbpass<br>\nuser = $dbuser"
    );
?>

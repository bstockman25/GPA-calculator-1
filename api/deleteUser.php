<?php
    include(dirname(__DIR__)."/secure/dbConnect.php");

    $cleanUN = "uTest1";

    $stmt = $dbconn->prepare("DELETE FROM User_Students WHERE userID = ?");
    $stmt->bind_param("s", $cleanUN);
    $stmt->execute();
    //$result = mysqli_execute($dbconn, array($cleanUN, $cleanLName, $cleanFName, $cleanUEmail));

    $stmt = $dbconn->prepare("DELETE FROM User_Authentication WHERE userID = ?");
    $stmt->bind_param("s", $cleanUN);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $dbconn->close();
    //echo "Success!";
    echo json_encode(array( "status" => "true", "message" => $result));
        
    
    echo "\n\n";

 ?>
<?php
header("Content-Type: application/json");

//$cleanTestData = htmlspecialchars($_POST['TestData']);
$test = json_encode($_POST);



$fp = fopen('test.json', 'w');
fwrite($fp, $test);
fclose($fp);

//echo json_encode(array( "status" => "false","message" => $params) );

?>
<?php
header("Content-Type: application/json");

//$cleanTestData = htmlspecialchars($_POST['TestData']);
$cleanTest = json_encode(htmlspecialchars($_POST));



$fp = fopen('test.json', 'w');
fwrite($fp, $cleanTest);
fclose($fp);

//echo json_encode(array( "status" => "false","message" => $params) );

?>
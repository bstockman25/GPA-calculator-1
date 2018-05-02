<?php
$cleanTestData = htmlspecialchars($_POST['TestData']);


$fp = fopen('test.json', 'w');
fwrite($fp, json_encode(array( "status" => "false","message" => $cleanTestData)));
fclose($fp);

echo json_encode(array( "status" => "false","message" => $cleanTestData) );

?>
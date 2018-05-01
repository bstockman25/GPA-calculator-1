<?php
$cleanTestData = htmlspecialchars($_POST['TestData']);

echo json_encode(array( "status" => "false","message" => $cleanTestData) );

?>
<?php
//https://jonsuh.com/blog/jquery-ajax-call-to-php-script-with-json-return/
if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
      $action = $_POST["action"];
      switch($action) { //Switch case for value of action
        case "StudentData": StudentData_function(); break;
      }
    }
  }
  
  //Function to check if the request is an AJAX request
  function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  }
  
  function StudentData_function(){
    $return = $_POST;
    
    $myObj->name = "John";
    $myObj->age = 30;
    $myObj->city = "New York";

    //$myJSON = json_encode($myObj);
    
    $return["json"] = json_encode($myObj);
    echo json_encode($return);
}



$studentClasses = array();


$json = json_encode($studentClasses);
echo $json;
exit;
?>
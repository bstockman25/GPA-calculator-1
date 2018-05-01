<?php

private $mysqli;
private $error = '';

public function _construct()
{
session_start();
$this->initDatabaseConnection();
$this->restoreOrdering();
}

public function _destruct()
{
if($this->mysqli)
{
$this->mysqli->close();
}
}

private function initDatabaseConnection()
{
		require('db_credentials.php'); //Needs to be revised appropriate php file
			$this->mysqli = new mysqli($servername, $username, $password, $dbname);
			if ($this->mysqli->connect_error) {
				$this->error = $mysqli->connect_error;
			}
}

		private function restoreUser() 
		{
			if ($loginID = $_SESSION['loginid']) 
			{
				$this->user = new User();
				if (!$this->user->load($loginID, $this->mysqli)) {
					$this->user = null;
				}
			}
		}
//login, logout, and other database functions were not included 

//Create Functions/////

private function addClass()
{
	$this->error = '';
			
			
	$stmt = $mysqli->prepare("INSERT INTO Classes(semesterTerm,semesterYear,className,classGrade)
	VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$_POST['semesterTerm'],$_POST['semesterYear'],$_POST['className'],$_POST['classGrade'],$_POST['email']);
    $stmt->execute();
    $stmt->close();
	$this->error = '';
	
    if (! $_GET['semesterTerm'] )
	{
	    $this->error = "Semester term needed";
		return $this->error;			
	}
	if (! $_GET['semesterYear'] )
	{
	    $this->error = "Semester year needed";
		return $this->error;			
	}
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;	
	}
	return $this->error;
}



private function addStudent()
{
    $stmt = $mysqli->prepare("INSERT INTO Students(gradePoints,credits,firstName,lastName,email)
	VALUES (?,?,?,?,?)");
    $stmt->bind_param("diss",$_POST['gradePoints'],$_POST['credits'],$_POST['firstName'],$_POST['lastName'],$_POST['email']);
    $stmt->execute();
    $stmt->close();
	
	$this->error = '';
	
		if (! $_GET['email'] )
	{
	    $this->error = "Email is needed.";
		return $this->error;
	}
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
		
}


//Delete Functions/////
private function deleteClass($_GET['classId'])
{
	$this->error = '';
	$stmt = $mysqli->prepare("DELETE FROM Classes WHERE classId = ?");
	$stmt->bind_param("i",$_SESSION['classId']);
	$stmt->execute();
	$stmt->close();
	
	if(!$result = $this->mysqli)
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	
	if(!$_GET['classId'])
	{
    $this->error = $this->mysqli->error;
	return $this->error;	
	}
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	return $this->error;
}

private function deleteStudent($_GET['studentId'])
{
	$this->error = '';
	if(!$result = $this->mysqli)
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	$stmt = $mysqli->prepare("DELETE FROM Students WHERE studentId = ?");
	$stmt->bind_param("i",$_SESSION['studentId']);
	$stmt->execute();
	$stmt->close();
	
	if(!$_GET['studentId'])
	{
    $this->error = $this->mysqli->error;
	return $this->error;	
	}
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	return $this->error;	
}

//Update Functions/////
private function updateClass()
{
	$stmt = $mysqli->prepare("UPDATE Classes SET semesterTerm = ?, semesterYear = ?. className = ?, classGrade = ?
	WHERE classId = ?");
	$stmt->bind_param("ssss",$_POST['semesterTerm'],$_POST['semesterYear']$_POST['className'],$_POST['classGrade'],
	$_SESSION['classId']);
	$stmt->execute();
	$stmt->close();

if (! $result = $this->mysqli->query($sql) ) 
{
	$this->error = $this->mysqli->error;
} 
			
	return $this->error;
}

private function updateStudent()
{
	
	$stmt = $mysqli->prepare("UPDATE Students SET gradePoints = ?, credits = ?. firstName = ?, lastName = ?, email =?
	WHERE studentId = ?");
	$stmt->bind_param("disss",$_POST['gradePoints'],$_POST['credits']$_POST['firstName'],$_POST['lastName'],$_POST[email],
	$_SESSION['studentId']);
	$stmt->execute();
	$stmt->close();
	
	
    if (! $result = $this->mysqli->query($sql) ) 
	{
	$this->error = $this->mysqli->error;
	} 
			
    return $this->error;
}

//Read Functions/////
private function getClass($_GET['classId'])
{
$this->error = '';

$stmt = $mysqli->prepare("SELECT * FROM Classes WHERE classId = ?");
$stmt->bind_param("i", $_POST['classId']);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
  $arr[] = $row;
}
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();

if (! $this->mysqli) 
    {
	$this->error = "No connection to database.";
	return array($result, $this->error);
	}
			
if (! $_GET['classId']) 
{
	$this->error = "No class id specified for the data to retrieve.";
	return array($task, $this->error);
	}		
    
}

private function getStudent($_GET['studentId'])
{ 
$this->error = '';

$stmt = $mysqli->prepare("SELECT * FROM Students WHERE studentId = ?");
$stmt->bind_param("i", $_POST['studentId']);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
  $arr[] = $row;
}
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();

if (! $this->mysqli) 
    {
	$this->error = "No connection to database.";
	return array($result, $this->error);
	}
			
if (! $_GET['studentId']) 
{
	$this->error = "No student id specified for the data to retrieve.";
	return array($task, $this->error);
	}
				
}


 ?>
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

}

//Create Functions/////

private function addClass($data)
{
	$this->error = '';
	
	$class_id = $data('classId');
	$semester_term = $data('semesterTerm');
	$semester_year = $data('semesterYear');
	$class_name = $data('className');
	$class_grade = $data('classGrade');
	$student_id = $data('studentId');
	
	/*
	$semesterTermEscaped = $this->mysqli->real_escape_string($semester_term);
	$classNameEscaped = $this->mysqli->real_escape_string($class_name);
	$classGradeEscaped = $this->mysqli->real_escape_string($class_grade);
	*/
	
	$sql = "INSERT INTO Classes (semesterTerm,semesterYear,className,classGrade,studentId)
	VALUES ('$semester_term','$semester_year','$class_name','$class_grade','$student_id'";
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;	
	}
	return $this->error;
}

private function addStudent()
{
	$this->error = '';
	
	$student_id = $data('studentId');
	$grade_points = $data('gradePoints');
	$credits = $data('credits');
	$first_name = $data('firstName');
	$last_name = $data('lastName');
	$email = $data('email');
	$password = $data('password');
	
	$sql = "INSERT INTO Students (gradePoints, credits, firstName,lastName,email,password)
	VALUES ('$grade_points','$credits','$first_name', '$last_name', '$email','$password')";
	
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
		
}


//Delete Functions/////
private function deleteClass($id)
{
	$this->error = '';
	if(!$result = $this->mysqli)
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	
	
	if(!$class_id)
	{
    $this->error = $this->mysqli->error;
	return $this->error;	
	}
	
	$sql = "DELETE FROM Classes WHERE classId = $class_id AND classId = $class_id";
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	return $this->error;
}

private function deleteStudent($id)
{
	$this->error = '';
	if(!$result = $this->mysqli)
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	
	
	if(!$class_id)
	{
    $this->error = $this->mysqli->error;
	return $this->error;	
	}
	
	$sql = "DELETE FROM Students WHERE studentId = $student_id AND studentId = $student_id";
	if(!$result = $this->mysqli->query($sql))
	{
	$this->error = $this->mysqli->error;
	return $this->error;
	}
	return $this->error;	
}

//Udate Functions/////
private function updateClass($data)
{
	$class_id = $data('classId');
	$semester_term = $data('semesterTerm');
	$semester_year = $data('semesterYear');
	$class_name = $data('className');
	$class_grade = $data('classGrade');
	$student_id = $data('studentId');

$sql = "UPDATE Classes SET semesterTerm = '$semester_term',semesterYear = '$semester_year', className = '$class_name', classGrade = '$class_grade'
WHERE classId = '$class_id'";

if (! $result = $this->mysqli->query($sql) ) 
{
	$this->error = $this->mysqli->error;
} 
			
	return $this->error;
}

private function updateStudent($data)
{
    $student_id = $data('studentId');
	$grade_points = $data('gradePoints');
	$credits = $data('credits');
	$first_name = $data('firstName');
	$last_name = $data('lastName');
	$email = $data('email');
	
	$sql = "UPDATE Students SET gradePoints = '$grade_points',credits = '$credits', firstName = '$first_name', lastName = '$last_name', email = '$email'
	WHERE = studentId = '$student_id'";
	
    if (! $result = $this->mysqli->query($sql) ) 
	{
	$this->error = $this->mysqli->error;
	} 
			
    return $this->error;
}

//Read Functions/////
private function getClass($id)
{
	$sql = "SELECT * FROM Classes WHERE classId = $class_id";

}

private function getStudent()
{
	$sql = "SELECT * FROM Students WHERE studentId = $student_id";
}







 ?>
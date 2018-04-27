CREATE DATABASE gpaDatabase;

CREATE TABLE Students 
(
studentId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
gradePoints DOUBLE NOT NULL AUTO_INCREMENT=0.0,
credits INT NOT NULL AUTO_INCREMENT=0 ,
firstName VARCHAR(128) NOT NULL,
lastName VARCHART(128) NOT NULL,
email VARCHAR(128) NOT NULL,

FOREIGN KEY (classId) REFERENCES Classes(classId)
PRIMARY KEY (studentId)
);


CREATE TABLE Classes
(
classId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
semesterTerm VARCHAR(128) NOT NULL,
semesterYear YEAR(4) NOT NULL,
className VARCHAR(128) NOT NULL,
classGrade VARCHAR(128) NOT NULL,
FOREIGN KEY (studentId) REFERENCES Students(studentId),
PRIMARY KEY (classId)
);

CREATE TABLE Authentication 
(
	userId		VARCHAR(50) REFERENCES user_info ON DELETE CASCADE,
	passwordHash	VARCHAR(40) NOT NULL,
	PRIMARY KEY (userId),
	FOREIGN KEY (studentId)
);

CREATE TABLE Salt 
(
    userId	    VARCHAR(50) REFERENCES user_info ON DELETE CASCADE,
    salt			VARCHAR(40) NOT NULL,
    PRIMARY KEY (userId),
	FOREIGN KEY (studentId)
);
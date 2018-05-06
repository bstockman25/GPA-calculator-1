DROP SCHEMA IF EXISTS gpa;

CREATE SCHEMA gpa;
--SET SEARCH_PATH = gpa;


DROP TABLE IF EXISTS User_Students;
CREATE TABLE User_Students (
	userID VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	gradePoints FLOAT,
	credits INT,
	PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS User_Authentication;
CREATE TABLE User_Authentication (
    userID varchar(50),
    passwordHash varchar(40) NOT NULL,
	salt varchar(40) NOT NULL,
	PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS User_Classes;
CREATE TABLE User_Classes
(
	classId INT NOT NULL AUTO_INCREMENT,
	userID varchar(50),
	semesterTerm VARCHAR(128) NOT NULL,
	semesterYear VARCHAR(4) NOT NULL,
	className VARCHAR(128) NOT NULL,
	classGrade DOUBLE NOT NULL, 
	PRIMARY KEY (classId)
);
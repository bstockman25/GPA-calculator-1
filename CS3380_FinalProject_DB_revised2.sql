

CREATE TABLE Students 
(
studentId INT NOT NULL AUTO_INCREMENT,
gradePoints DOUBLE NOT NULL,
credits INT NOT NULL,
firstName VARCHAR(128) NOT NULL,
lastName VARCHAR(128) NOT NULL,
email VARCHAR(50) NOT NULL,
PRIMARY KEY (studentId)
);

CREATE TABLE Classes
(
classId INT NOT NULL AUTO_INCREMENT,
semesterTerm VARCHAR(128) NOT NULL,
semesterYear VARCHAR(4) NOT NULL,
className VARCHAR(128) NOT NULL,
classGrade DOUBLE NOT NULL, 
email VARCHAR(50) NOT NULL,
PRIMARY KEY (classId)
);

CREATE TABLE UserAuthentication 
(
	email	VARCHAR(50) PRIMARY KEY,
	passwordHash	VARCHAR(40) NOT NULL,
	userId INT NOT NULL
);

CREATE TABLE SaltTable 
(
    userId INT AUTO_INCREMENT REFERENCES user_info ON DELETE CASCADE,
    salt VARCHAR(40) NOT NULL,
    PRIMARY KEY (userId)

);
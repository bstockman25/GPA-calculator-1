### Group Members

- Jason Pulis
- Ben Stockman
- Bradley Boutaugh
- Carmel Braga
- Eric Mitchell

### GPA-calculator-1

http://mygpa.ninja/

A php, mysql, and angularJS GPA calculator with user data storage. The application allows the user to create a private account where they will be able to enter their current GPA and classes not only along with its credit count. The application is divided by semesters and allows the user to enter expected grades for future classes or classes that haven't been graded yet to simulate their future GPA.

### Schema

	CREATE DATABASE gpaDatabase;


	CREATE TABLE Students

	(

		studentId INT NOT NULL AUTO_INCREMENT,

		gradePoints DOUBLE NOT NULL AUTO_INCREMENT=0.0,

		credits INT NOT NULL AUTO_INCREMENT=0 ,

		firstName VARCHAR(128) NOT NULL,

		lastName VARCHART(128) NOT NULL,

		email VARCHAR(50) NOT NULL,


		FOREIGN KEY (email)  REFERENCES Authentication(email) ON DELETE CASCADE,

		PRIMARY KEY (studentId)

	);


	CREATE TABLE Classes

	(

		classId INT NOT NULL AUTO_INCREMENT,

		semesterTerm VARCHAR(128) NOT NULL,

		semesterYear YEAR(4) NOT NULL,

		className VARCHAR(128) NOT NULL,

		classGrade VARCHAR(128) NOT NULL,

		email VARCHAR(50) NOT NULL,

		FOREIGN KEY (email) REFERENCES Students() ON DELETE CASCADE,

		PRIMARY KEY (classId)

	);


	CREATE TABLE Authentication 

	(

		email VARCHAR(50) PRIMARY KEY,

		passwordHash VARCHAR(40) NOT NULL,

		PRIMARY KEY (email),

		FOREIGN KEY (userId) REFERENCES Salt() ON DELETE CASCADE

	);


	CREATE TABLE Salt 

	(

	    userID VARCHAR(50) REFERENCES user_info ON DELETE CASCADE,

	    salt VARCHAR(40) NOT NULL,

	    PRIMARY KEY (userId),

	);


### ERD 

![alt text](https://78.media.tumblr.com/81bc8997486433ac35ffad82fc700c3a/tumblr_p85vy4bCaS1xsn5tjo1_1280.png "ERD")

### CRUD

- Create: from the Login button, you have the option to register for an account by clicking "New user Register for MyGPA." From here you enter your user data and create a password, which is all saved in the DB.

- Read: Once you have created an account, you are taken to your "User Settings" window, which can also be accessed any time that you are logged in by clicking the button with your username at the top right side of the menu bar. The "User Settings" window displays your account details from the DB.

- Update: On the "User Settings" window, you can update any of the profile information, as well as your starting GPA information, and click "Submit" to update this information in the DB.

- Delete: On the "User Settings" window, you have the option to completely delete all of your user settings and save profile information from the DB by clicking the "Delete User Account" at the bottom of the screen.

### Video Demonstration

https://youtu.be/lsFpF476eno


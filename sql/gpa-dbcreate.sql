DROP SCHEMA IF EXISTS gpa CASCADE;

CREATE SCHEMA gpa;
SET SEARCH_PATH = gpa;


DROP TABLE IF EXISTS user_info;
CREATE TABLE user_info (
	userID			varchar(50) REFERENCES user_info on DELETE CASCADE,
	registration_date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    lastName		varchar(50) NOT NULL,
    firstName		varchar(50) NOT NULL,
	email			varchar(50) NOT NULL,
	PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS user_authentication;
CREATE TABLE user_authentication (
	userID			varchar(50) REFERENCES user_info on DELETE CASCADE,
	passwordHash	varchar(40) NOT NULL,
	PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS user_salt;
CREATE TABLE user_salt (
    userID			varchar(50) REFERENCES user_info on DELETE CASCADE,
    salt			varchar(40) NOT NULL,
    PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS user_log;
CREATE TABLE user_log (
	log_id  	SERIAL PRIMARY KEY,
	userID		varchar(50) REFERENCES user_info on DELETE CASCADE,
	ip_address 	VARCHAR(15) NOT NULL,
	log_date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	phpSID		VARCHAR(50) NOT NULL,
	urlUID		VARCHAR(50) NOT NULL,
	action 		VARCHAR(50) NOT NULL
);
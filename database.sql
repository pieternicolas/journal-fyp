CREATE DATABASE touchfyp;

CREATE TABLE admin(
	AdminID			 	INT (25)         NOT NULL 	UNIQUE,
	AdminFirstName		VARCHAR (50)     NOT NULL,
	AdminLastName		VARCHAR (50)     NOT NULL,
	AdminUsername 		VARCHAR (50)     NOT NULL	UNIQUE,
	AdminHashPassword	VARCHAR (100)    NOT NULL,
	AdminStatus			BOOLEAN			 NOT NULL 	DEFAULT '1',
	CONSTRAINT pk_ADMIN PRIMARY KEY (AdminID)
);


CREATE TABLE adminpassword(
	AdminClearID 	  	INT (25)         NOT NULL	UNIQUE	AUTO_INCREMENT,
	AdminPassword 		VARCHAR (50)     NOT NULL,
	AdminID 			INT (25)    	 NOT NULL	UNIQUE,
	CONSTRAINT pk_ADMINPASSWORD PRIMARY KEY (AdminClearID),
	CONSTRAINT fk_ADMINPASSWORD FOREIGN KEY (AdminID) REFERENCES admin(AdminID)
);

CREATE TABLE v1student(
	V1StudentID  	 	VARCHAR (25)     NOT NULL	UNIQUE,
	V1StudFirstName		VARCHAR (50)     NOT NULL,
	V1StudLastName 		VARCHAR (50)     NOT NULL,
	V1UserName 			VARCHAR (50)     NOT NULL	UNIQUE,
	V1HashPass			VARCHAR (100)    NOT NULL,
	V1Email				VARCHAR (100)    NOT NULL	UNIQUE,
	V1Age				INT 	(10)     NOT NULL,
	V1StudCreatedDate	Date 	    	 NOT NULL,
	CONSTRAINT pk_V1Student PRIMARY KEY (V1StudentID)
);

CREATE TABLE v1journal(
	V1JournalID  	VARCHAR (25)    NOT NULL	UNIQUE,
	V1Title			VARCHAR (50)    NOT NULL,
	V1Content 		TEXT    		NOT NULL,
	V1LastChanged 	DateTime     		NOT NULL,
	V1StudentID		VARCHAR (25)    NOT NULL,
	CONSTRAINT pk_V1Journal PRIMARY KEY (V1JournalID),
	CONSTRAINT fk_V1Journal FOREIGN KEY (V1StudentID) REFERENCES v1student(V1StudentID)
);

CREATE TABLE v1clearpassword(
	V1ClearID 	  	INT (25)        NOT NULL	UNIQUE	AUTO_INCREMENT,
	V1Password 		VARCHAR (50)    NOT NULL,
	V1StudentID 	VARCHAR (25)    NOT NULL	UNIQUE,
	CONSTRAINT pk_V1ClearPassword PRIMARY KEY (V1ClearID),
	CONSTRAINT fk_V1ClearPassword FOREIGN KEY (V1StudentID) REFERENCES v1student(V1StudentID)
);

CREATE TABLE v2student(
	V2StudentID  	 	VARCHAR (25)     NOT NULL	UNIQUE,
	V2StudFirstName		VARCHAR (50)     NOT NULL,
	V2StudLastName 		VARCHAR (50)     NOT NULL,
	V2UserName 			VARCHAR (50)     NOT NULL	UNIQUE,
	V2HashPass			VARCHAR (100)    NOT NULL,
	V2Email				VARCHAR (100)    NOT NULL	UNIQUE,
	V2Age				INT 	(10)     NOT NULL,
	V2StudCreatedDate	Date 	    	 NOT NULL,
	CONSTRAINT pk_V2Student PRIMARY KEY (V2StudentID)
);

CREATE TABLE v2journal(
	V2JournalID  	VARCHAR (25)    NOT NULL	UNIQUE,
	V2Title			VARCHAR (50)    NOT NULL,
	V2Content 		TEXT    		NOT NULL,
	V2LastChanged 	DateTime     		NOT NULL,
	V2StudentID		VARCHAR (25)    NOT NULL,
	CONSTRAINT pk_V2Journal PRIMARY KEY (V2JournalID),
	CONSTRAINT fk_V2Journal FOREIGN KEY (V2StudentID) REFERENCES v2student(V2StudentID)
);

CREATE TABLE v2clearpassword(
	V2ClearID 	  	INT (25)        NOT NULL	UNIQUE	AUTO_INCREMENT,
	V2Password 		VARCHAR (50)    NOT NULL,
	V2StudentID 	VARCHAR (25)    NOT NULL	UNIQUE,
	CONSTRAINT pk_V2ClearPassword PRIMARY KEY (V2ClearID),
	CONSTRAINT fk_V2ClearPassword FOREIGN KEY (V2StudentID) REFERENCES v2student(V2StudentID)
);

CREATE TABLE v3student(
	V3StudentID  	 	VARCHAR (25)     NOT NULL	UNIQUE,
	V3StudFirstName		VARCHAR (50)     NOT NULL,
	V3StudLastName 		VARCHAR (50)     NOT NULL,
	V3UserName 			VARCHAR (50)     NOT NULL	UNIQUE,
	V3HashPass			VARCHAR (100)    NOT NULL,
	V3Email				VARCHAR (100)    NOT NULL	UNIQUE,
	V3Age				INT 	(10)     NOT NULL,
	V3StudCreatedDate	Date 	    	 NOT NULL,
	CONSTRAINT pk_V3Student PRIMARY KEY (V3StudentID)
);

CREATE TABLE v3journal(
	V3JournalID  	VARCHAR (25)        NOT NULL	UNIQUE,
	V3Title			VARCHAR (50)    NOT NULL,
	V3Content 		TEXT    		NOT NULL,
	V3LastChanged 	DateTime     		NOT NULL,
	V3StudentID		VARCHAR (25)    NOT NULL,
	CONSTRAINT pk_V3Journal PRIMARY KEY (V3JournalID),
	CONSTRAINT fk_V3Journal FOREIGN KEY (V3StudentID) REFERENCES v3student(V3StudentID)
);

CREATE TABLE v3clearpassword(
	V3ClearID 	  	INT (25)        NOT NULL	UNIQUE	AUTO_INCREMENT,
	V3Password 		VARCHAR (50)    NOT NULL,
	V3StudentID 	VARCHAR (25)    NOT NULL	UNIQUE,
	CONSTRAINT pk_V3ClearPassword PRIMARY KEY (V3ClearID),
	CONSTRAINT fk_V3ClearPassword FOREIGN KEY (V3StudentID) REFERENCES v3student(V3StudentID)
);

INSERT INTO admin (ADMINID,ADMINFIRSTNAME, ADMINLASTNAME, ADMINUSERNAME, ADMINHASHPASSWORD) 
VALUES('12345678', 'Florence', 'mwagwabi', 'root', md5('password'));


INSERT INTO adminpassword (ADMINPASSWORD, ADMINID) 
VALUES('password', '12345678');

CREATE USER 'User'@'%' IDENTIFIED WITH mysql_native_password;
GRANT USAGE ON *.* TO 'User'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;SET PASSWORD FOR 'User'@'%' = PASSWORD('password');

GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`admin` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`adminpassword` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v1student` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE, DELETE ON `touchfyp`.`v1journal` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v1clearpassword` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v2student` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE, DELETE ON `touchfyp`.`v2journal` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v2clearpassword` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v3student` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE, DELETE ON `touchfyp`.`v3journal` TO 'User'@'%';
GRANT SELECT, INSERT, UPDATE ON `touchfyp`.`v3clearpassword` TO 'User'@'%';
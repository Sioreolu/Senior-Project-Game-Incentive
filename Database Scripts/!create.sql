drop schema if exists Game;
create schema Game;

use Game;

create table Users (
userID int(11) auto_increment,
userName varchar(30),
pass varchar(50),
email varchar(255),
firstName varchar(30),
lastName varchar(30),
PRIMARY KEY (userID),
UNIQUE KEY (userName)
);

create table Scores (
scoreID int(11) auto_increment,
userID int(11),
score int(10),
scoreDate datetime,
PRIMARY KEY (userID),
PRIMARY KEY (userID),
FOREIGN KEY fk_user(userID)
REFERENCES Users(userID)
ON UPDATE CASCADE
ON DELETE RESTRICT
);

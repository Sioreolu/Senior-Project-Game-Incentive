use reynaj;# MySQL returned an empty result set (i.e. zero rows).

Drop table if exists Users;# MySQL returned an empty result set (i.e. zero rows).

Drop table if exists Scores;# MySQL returned an empty result set (i.e. zero rows).


create table Users (
userID int(11) auto_increment,
userName varchar(30),
pass varchar(50),
email varchar(255),
firstName varchar(30),
lastName varchar(30),
PRIMARY KEY (userID),
UNIQUE KEY (userName)
);# MySQL returned an empty result set (i.e. zero rows).


create table Scores (
scoreID int(11) auto_increment,
userID int(11),
score int(10),
scoreDate datetime,
PRIMARY KEY (scoreID),
FOREIGN KEY fk_user(userID)
REFERENCES Users(userID)
ON UPDATE CASCADE
ON DELETE RESTRICT
);# MySQL returned an empty result set (i.e. zero rows).

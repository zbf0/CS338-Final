CREATE DATABASE sampleDB;
USE sampleDB;

-- read from title.akas.csv

CREATE TABLE titleAkas (
    titleId varchar(256),
    ordering int,
    title varchar(256),
    region varchar(256),
    language varchar(256),
    types varchar(256),
    attributes varchar(256),
    isOriginalTitle int
);
LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/sample.title.akas.csv'
INTO TABLE titleakas
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

-- create table for users

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    fname VARCHAR(50),
    lname VARCHAR(50),
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- create table for viewingHistory

CREATE TABLE viewingHistory (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId INT NOT NULL,
    titleId varchar(256),
    watched_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- create table for contactForm

CREATE TABLE contactForm (
    cid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date INT NOT NULL,
    isComplete INT NOT NULL,
    userId INT,
    SId INT,
    content VARCHAR(1000)
);

-- create table for userAuthentication

CREATE TABLE userAuthentication (
    userid INT NOT NULL UNIQUE
    username VARCHAR(50)
    email VARCHAR(50)
);

-- create table for staff

CREATE TABLE staff (
    SId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    SFname VARCHAR(50),
    SLname VARCHAR(50)
);

-- create table for User comment/rating

CREATE TABLE comment (
    commentId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rating INT,
    comment VARCHAR(1000),
    commentAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(50) NOT NULL UNIQUE,
    userid INT NOT NULL,
    tconst VARCHAR(256)
);

-- add more later

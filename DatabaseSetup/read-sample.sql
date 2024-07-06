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

-- read from title.ratings.csv
CREATE TABLE titleRatings (
    titleId varchar(256),
    averageRating FLOAT,
    numVotes INT
);
LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/sample.title.ratings.csv'
INTO TABLE titleRatings
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
    titleId varchar(256) NOT NULL,
    ordering INT NOT NULL,
    date VARCHAR(21) NOT NULL
);

-- create table for contactForm

CREATE TABLE contactForm (
    cid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date VARCHAR(10) NOT NULL,
    isComplete INT NOT NULL,
    name VARCHAR(50),
    email VARCHAR(50),
    content VARCHAR(1000),
    SId INT
);

-- create table for User comment/rating

CREATE TABLE comment (
    commentId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(1000) NOT NULL,
    rating INT NOT NULL,
    userId INT NOT NULL,
    titleId VARCHAR(256) NOT NULL,
    ordering INT NOT NULL,
    date VARCHAR(21) NOT NULL
);

-- create table for top movies

CREATE TABLE hot (
    hotId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titleId VARCHAR(256) NOT NULL,
    rating INT NOT NULL
);
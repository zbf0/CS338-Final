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

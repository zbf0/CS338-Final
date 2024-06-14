use sampledb;

-- Test title search

SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "Carmencita";

SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "doNotExist";

-- Test user register & login

INSERT INTO users (email, password) VALUES ("testsample@gmail.com", "testsample");

SET @e := (SELECT email FROM users WHERE email = "testsample@gmail.com");
SET @p := (SELECT password FROM users WHERE email = "testsample@gmail.com");

SELECT @e;
SELECT STRCMP(@e, "testsample@gmail.com");
SELECT STRCMP(@p, "wrongpassword");

select * from users;

DELETE FROM users WHERE email = "testsample@gmail.com";
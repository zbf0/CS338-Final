use sampledb;

-- Create the user
DROP USER IF EXISTS 'sujaya'@'localhost';
CREATE USER 'sujaya'@'localhost' IDENTIFIED BY 'Password0!';

-- Grant all privileges on the testDB database to the new user
GRANT ALL ON testDB.* TO 'sujaya'@'localhost';

-- Change the authentication method of the user to use mysql_native_password
ALTER USER 'sujaya'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Password0!';


-- Test title search --------------------------------------------------------------------------------------

SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "Carmencita";

SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "doNotExist";


-- Test user register & login --------------------------------------------------------------------------------------

INSERT INTO users (email, password) VALUES ("testsample@gmail.com", "testsample");

SELECT email FROM users WHERE email = "testsample@gmail.com";
SELECT password FROM users WHERE email = "testsample@gmail.com";

SELECT * from users;

DELETE FROM users WHERE email = "testsample@gmail.com";


-- User history --------------------------------------------------------------------------------------

INSERT INTO viewingHistory (userId, titleId) VALUES (1, "tt0000001");

SELECT titleId FROM viewingHistory WHERE userId = 1;

DELETE FROM viewingHistory WHERE userId = 1;
use sampledb;

-- Test user register & login --------------------------------------------------------------------------------------

-- check if email exist
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com";
-- register
INSERT INTO users (email, password) VALUES ("test@gmail.com", "testpassword");

-- user update name
UPDATE users SET fname = "T", lname = "T" WHERE email = "test@gmail.com";
-- check if account exist, 1 means email & password matches, 0 means wrong email / password
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "testpassword";
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "error";
SELECT * from users;
DELETE FROM users WHERE email = "test@gmail.com";

-- Test title search --------------------------------------------------------------------------------------

SELECT titleid,title,ordering,region,language,types,attributes,isOriginalTitle FROM titleAkas WHERE title = "Carmencita";
SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "doNotExist";

-- Movie detailed information

SELECT titleAkas.title,titleAkas.ordering,titleAkas.region,titleAkas.types,titleRatings.averageRating,titleRatings.numVotes
FROM titleAkas
LEFT JOIN titleRatings ON titleAkas.titleId = titleRatings.titleId LIMIT 10;

-- Test user history --------------------------------------------------------------------------------------

INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000001", 1, "2024/01/01 00:00:00am");
SELECT titleId FROM viewingHistory WHERE userId = 1;
DELETE FROM viewingHistory WHERE userId = 1;

-- Test user comment --------------------------------------------------------------------------------------

INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment1", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
SELECT titleId, comment, userId FROM comment WHERE userId = 1;
DELETE FROM viewingHistory WHERE userId = 1;

-- Test user rating --------------------------------------------------------------------------------------

-- original rating
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";
SELECT averageRating, numVotes INTO @ave, @num FROM titleRatings WHERE titleId = "tt0000001";
-- update rating
UPDATE titleRatings SET averageRating = (@ave*@num+5)/(@num+1), numVotes = @num+1 WHERE titleId = "tt0000001";
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";

-- Popular movie rating --------------------------------------------------------------------------------------

SELECT titleid,averageRating FROM titleRatings ORDER BY averageRating DESC LIMIT 5;
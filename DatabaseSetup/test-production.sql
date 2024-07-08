use moviedb;

-- Test user register & login --------------------------------------------------------------------------------------

-- add some random user
INSERT INTO users (email, password) VALUES ("1test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("2test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("3test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("4test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("5test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("6test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("7test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("8test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("9test@gmail.com", "testpassword");
INSERT INTO users (email, password) VALUES ("0test@gmail.com", "testpassword");
-- check if email exist
SELECT COUNT(*) FROM users WHERE email = "1test@gmail.com";
-- check efficiency with index created
CREATE UNIQUE INDEX idx_email ON users (email);
SELECT COUNT(*) FROM users WHERE email = "1test@gmail.com";
ALTER TABLE users DROP INDEX idx_email;

-- check if account exist, 1 means email & password matches, 0 means wrong email / password
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "testpassword";
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "error";
-- check efficiency with index created
CREATE UNIQUE INDEX idx_emailpassword ON users (email,password);
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "testpassword";
SELECT COUNT(*) FROM users WHERE email = "test@gmail.com" AND password = "error";
ALTER TABLE users DROP INDEX idx_emailpassword;


-- Test title search --------------------------------------------------------------------------------------

SELECT titleid,title,ordering,region,language,types,attributes,isOriginalTitle FROM titleAkas WHERE title = "Carmencita";
SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "doNotExist";
-- check efficiency with index created
CREATE INDEX idx_title ON titleAkas (title);
SELECT titleid,title,ordering,region,language,types,attributes,isOriginalTitle FROM titleAkas WHERE title = "Carmencita";
SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = "doNotExist";
ALTER TABLE titleAkas DROP INDEX idx_title;


-- Test Movie detailed information --------------------------------------------------------------------------------------

SELECT titleAkas.title,titleAkas.ordering,titleAkas.region,titleAkas.types,titleRatings.averageRating,titleRatings.numVotes
FROM titleAkas
LEFT JOIN titleRatings ON titleAkas.titleId = titleRatings.titleId LIMIT 10;
-- check efficiency with index created
CREATE INDEX idx_titleId ON titleAkas (titleId);
SELECT titleAkas.title,titleAkas.ordering,titleAkas.region,titleAkas.types,titleRatings.averageRating,titleRatings.numVotes
FROM titleAkas
LEFT JOIN titleRatings ON titleAkas.titleId = titleRatings.titleId LIMIT 10;
ALTER TABLE titleAkas DROP INDEX idx_titleId;

-- Test user history --------------------------------------------------------------------------------------

INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000002", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000003", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000004", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000005", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000002", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000003", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000004", 1, "2024/01/01 00:00:00am");
INSERT INTO viewingHistory (userId, titleId, ordering, date) VALUES (1, "tt0000005", 1, "2024/01/01 00:00:00am");
SELECT titleId,ordering,date FROM viewingHistory WHERE userId = 1;
-- check efficiency with index created
CREATE INDEX idx_userId ON viewingHistory (userId);
SELECT titleId,ordering,date FROM viewingHistory WHERE userId = 1;
ALTER TABLE viewingHistory DROP INDEX idx_userId;
DELETE FROM viewingHistory WHERE userId = 1;

-- Test user comment --------------------------------------------------------------------------------------

INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment1", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment2", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment3", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment4", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment5", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment1", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment2", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment3", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment4", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
INSERT INTO comment (comment, rating, userId, titleId, ordering, date) VALUES ("comment5", 5, 1, "tt0000001", 1, "2024/01/01 00:00:00am");
SELECT titleId, comment, userId FROM comment WHERE userId = 1;
-- check efficiency with index created
CREATE INDEX idx_userId ON comment (userId);
SELECT titleId, comment, userId FROM comment WHERE userId = 1;
ALTER TABLE comment DROP INDEX idx_userId;
DELETE FROM comment WHERE userId = 1;

-- Test user rating --------------------------------------------------------------------------------------

-- original rating
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";
SELECT averageRating, numVotes INTO @ave, @num FROM titleRatings WHERE titleId = "tt0000001";
-- update rating
UPDATE titleRatings SET averageRating = (@ave*@num+5)/(@num+1), numVotes = @num+1 WHERE titleId = "tt0000001";
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";
-- check efficiency with index created
CREATE INDEX idx_titleId ON titleRatings (titleId);
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";
SELECT averageRating, numVotes INTO @ave, @num FROM titleRatings WHERE titleId = "tt0000001";
UPDATE titleRatings SET averageRating = (@ave*@num+5)/(@num+1), numVotes = @num+1 WHERE titleId = "tt0000001";
SELECT averageRating, numVotes FROM titleRatings WHERE titleId = "tt0000001";
ALTER TABLE titleRatings DROP INDEX idx_titleId;



-- Popular movie rating --------------------------------------------------------------------------------------

SELECT titleid,averageRating FROM titleRatings ORDER BY averageRating DESC LIMIT 5;
-- check efficiency with index created
CREATE UNIQUE INDEX idx_titleId ON titleRatings (titleId);
SELECT titleid,averageRating FROM titleRatings ORDER BY averageRating DESC LIMIT 5;
ALTER TABLE titleRatings DROP INDEX idx_titleId;

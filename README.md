==============================================================================================================================

Website Setup Guide:

1. Download the Raw Data. Make sure the Raw Fata Fiels are CSV files or convert them to this format if need be:
    https://onedrive.live.com/?id=B432689A86B2CE06%21sb0033c43999b4a2eb6078f156d0aeefb&cid=B432689A86B2CE06&redeem=aHR0cHM6Ly8xZHJ2Lm1zL2YvYy9iNDMyNjg5YTg2YjJjZTA2L0VrTThBN0NibVM1S3RnZVBGVzBLN3ZzQkhHMUNHYklSejdkaGlTSjJDUVEzWlE%5FZT01OjZSOUtQMSZzaGFyaW5ndjI9dHJ1ZSZmcm9tU2hhcmU9dHJ1ZSZhdD05

2. Download and setup all required applications (Apache, MySQL, XAMPP).
   
3. In MySQL command client, run the following command below. It return the path to the principal directory to store the input files:

    SELECT @@secure_file_priv;

4. Copy all sample data and real data files to the address produced by this command. If you are not using MySQL 8.0 or did not download MySQL by default, replace the path in read-sample.sql by your path.

5. In MySQL command client, run config.sql:

    source [path to config.sql];

7. In MySQL Command Line Client, run read-sample.sql from the DatabaseSetup folder by following command to set up sample database (leave out the semicolon in the end):

    source [path to read-sample.sql];

8.  In MySQL command client, run read-production.sql from the DatabaseSetup by following command to set up production database (leave out the semicolon in the end):

    source [path to read-production.sql];

9. If you set up your own MySQL password, type it in config.php file from the WebsiteSetup folder.

10. In any browser, search localhost/index.php to open the web. (If you are using XAMPP, you need to copy all files in directory WebsiteSetup to xampp/htdocs. If the files were copied to a subfolder in htdocs, then you need to include that subfolder in any address, such as localhost/Website_Setup_Folder/index.php).

==============================================================================================================================

Testing Guide:

1. In MySQL Command Line Client, run text-sample.sql with the following command below (leave out the semicolon in the end):

    source [path to test-sample.sql];

2.  In MySQL command client, run test-production.sql with the following command below (leave out the semicolon in the end):

    source [path to test-production.sql];

[!] If you want to compare the time taken for queries with and without INDEX, you have to remove all commands that create INDEX in read-production.sql.

[!] In order to observe how well INDEX performs, I temporary removed all INDEX that we addded in read-production.sql. We observered that, for our large movie databases, INDEX decreases query time from 2-3 seconds to close to 0 seconds.

==============================================================================================================================

Features:

1. Basic search feature (search by exact title and print details).
2. User login/register.
3. User history.
4. User comment.
5. User rating.
6. Movie detailed information.
7. The 5 most popular movies in main page.
8. Top navigate bar.

==============================================================================================================================

File Description:

1. Directory DatabaseSetup store sql files to setup and test the databases (C2,C3,C4)
2. Directory SampleDatbase store csv file containing sample data.
3. Directory WebsiteSetup store php files to setup the web (C5).
4. README.md (C1)

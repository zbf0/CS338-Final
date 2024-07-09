<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>

<h1>About this project:<h1>
<h4>This is the website of CS338 - Computer Applications in Business Databases - Term Long Course Project.
The professor of this course who assigned this project was Khalid Ammar.
The group that worked on this project was Project Group 7.
The Current iteration of this project is Milestone 2.
The members of this group are Kewen Chen, Yan Tao, Wanqing Yao, Al-Hassan Ayman El-Hag & Bofang Zheng.
<h3>Project Description:
<h4>Our website aims to provide users with streamlined access to data pulled data from IMDB about movies, TV shows, and the like and supplies this data to perspective interested users of the website. The data pulled from IMDB will include but is not limited to the titles, regions, languages, characters, and ratings of various TV shows and movies across the websites. The intended users of this website are essentially anyone who has an interest in movies, TV shows, and other associated information coming from IMDB. The administrators of this website will be us, the group members working on this project. Among the functionalities we would like to support moving forward, these include but are not limited to: 
<h4> - Allowing users to create accounts and register<h4>
<h4> - Allowing users to log in and verify who they are<h4>
<h4> - Allowing users to search movies, TV shows, and associated data<h4>
<h4> - Keeping a history of what users had viewed in the past (COMPLETED)<h4>
<h4> - Allowing users to rate the movies (NEW)<h4>
<h4> - Adding important information about the movies (NEW)<h4>
<h4> - The top 5 movies shown on the main page (NEW)<h4>
<h3>System Support:
<h4>The choice of programming languages for this application is SQL and PHP, with SQL being used for all back-end duties of our website, including but not limited to data organization, querying, manipulation, and extraction, while PHP will be used for all web-related setups, primary the front-end of our website. The applications we’ll be making use of for this project are MySQL (at least version 8.0 or above) for the management of the backend data from IMDB and XAMPP for the management of our website itself. For now, the website and all associated data will need to be downloaded from GitHub and accessed through a local host on the user’s computer.
<h3>Sample Data Plan:
<h4>Our sample data was pulled from IMDB’s website, with each sample file containing 500 rows of data. The sample dataset so far is a set of 5 CSV files to test the data with (descriptions of the attributes can be found in the reference below):
<h4> - sample.title.akas has 8 attributes: titleID, ordering, title, region, language, types, attributes, and isOriginalTitle.	
<h4> - sample.title.basics has 9 attributes: tconst, titleType, primaryTitle, originalTitle, isAdult, startYear, endYear, runtimeMinutes, and “genres”.
<h4> - sample.title.episode has 4 attributes: tconst, parentTconst, seasonNumber, and epsiodeNumber.
<h4> - sample.title.principals has 6 attributes: tconst, ordering, nconst, category, job, and characters.
<h4> - sample.title.principals has 6 attributes: tconst, ordering, nconst, category, job, and characters.
<h4> - sample.title.ratings has 3 attributes: tconst, averageRating, and numVotes.
<h4> At this stage of the project, we are now pushing to incorporate the rest of the into our project. The project previously, only, consisted of sample.title.akas but it has now been expanded to begin including the other relevant datasets to this project: sample.title.basics, sample.title.episode, sample.title.principals, and sample.title.ratings.


</body>
</html>
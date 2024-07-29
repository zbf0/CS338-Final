<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<style>
body {
  background-image: url('source/white.jpg');
  background-position: center top;
  background-size: 100% auto;
  color: black;
}

.dark-mode {
  background-image: url('source/black.jpg');
  color: white;
}

.darkbuttom {background-color: #333;}

</style>
<script>
function dark_mode() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right">
    <li><button class = "darkbuttom" onclick="dark_mode()"><img src='source/dark.jpg' style=width:37px;height:37px;></button></li>
  </div>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>



<!--About page will contains basic info of our project-->

<h2>About this project:<h2>
<h4>This is the website of CS338 - Computer Applications in Business Databases - Term Long Course Project.
The professor of this course who assigned this project was Khalid Ammar.
The group that worked on this project was Project Group 7.
The members of this group are Kewen Chen, Yan Tao, Wanqing Yao, Al-Hassan Ayman El-Hag & Bofang Zheng.
<h3>System Support:
<h4>The choice of programming languages for this application is SQL and PHP, with SQL being used for all back-end duties of our website, including but not limited to data organization, querying, manipulation, and extraction, while PHP will be used for all web-related setups, primary the front-end of our website. The applications we’ll be making use of for this project are MySQL (at least version 8.0 or above) for the management of the backend data from IMDB and XAMPP for the management of our website itself. For now, the website and all associated data will need to be downloaded from GitHub and accessed through a local host on the user’s computer.

</body>
</html>
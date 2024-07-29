<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a class="active" href="user.php">User</a></li>
  <div style="float:right">
    <li><button class = "darkbuttom" onclick="dark_mode()"><img src='source/dark.jpg' style=width:37px;height:37px;></button></li>
  </div>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>
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
</body>
</html>

<!--user info, user can reset password, update info, view history, and logout here-->

<?php
ini_set('display_errors', 0);
require_once "config.php";


echo "<h3>Welcome! ";

$id = $_SESSION["id"];

$sql = "SELECT fname,lname FROM users WHERE id = '$id'";
$r = mysqli_query($conn, $sql);
if (mysqli_num_rows($r) > 0) {
	$row = mysqli_fetch_assoc($r);
	$fname = $row["fname"];
	$lname = $row["lname"];
	echo $fname . " " . $lname . "</h3>";
}

echo "<a href='updateInfo.php' class='btn btn-danger ml-3'>Update Your Information</a><br>";
echo "<a href='resetPassword.php' class='btn btn-warning'>Reset Your Password</a><br>";
echo "<a href='history.php' class='btn btn-warning'>History</a><br>";
echo "<a href='logout.php' class='btn btn-danger ml-3'>Sign Out</a><br>";


?>
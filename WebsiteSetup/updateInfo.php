<!DOCTYPE html>
<html>
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
</ul><br><h2>Update your information</h2><br>
<form method="post">
<label>fname</label>
<input type="text" name="fname"><br>
<label>lname</label>
<input type="text" name="lname">
<input type="submit" name="submit">
</form><br>
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

<!--Let user to update their name-->

<?php
ini_set('display_errors', 0);

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

if (isset($_POST["submit"])) {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    if (str_replace(' ', '', $fname) != "" && str_replace(' ', '', $lname) != "") {
        $sql = "UPDATE users SET fname = ?, lname = ? WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_fname, $param_lname, $param_id);
            $param_fname = $fname;
            $param_lname = $lname;
            $param_id = $_SESSION["id"];
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: user.php");
        }
    }
}

?>
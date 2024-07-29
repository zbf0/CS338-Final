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
  <li><a href="about.php">About</a></li>
  <li><a class="active" href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right">
    <li><button class = "darkbuttom" onclick="dark_mode()"><img src='source/dark.jpg' style=width:37px;height:37px;></button></li>
  </div>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>
</body>
</html>

<!--Deal with the submitted contact form-->

<?php
ini_set('display_errors', 0);
require_once "config.php";


$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$content = trim($_POST["content"]);

$sql = "INSERT INTO contactForm (date, isComplete, name, email, content, SId) VALUES (?, ?, ?, ?, ?, ?);";
if($stmt = mysqli_prepare($conn, $sql)){
  mysqli_stmt_bind_param($stmt, "ssssss", $param_date, $param_isCompleted, $param_name, $param_email, $param_content, $param_SId);
  $param_date = date("Y-m-d");
  $param_isCompleted = 0;
  $param_name = $name;
  $param_email = $email;
  $param_content = $content;
  $param_SId = 0;
  if(mysqli_stmt_execute($stmt)){
    echo "We have recieved your message";
  } else{
    echo "Oops! Something went wrong. Please try again later.";
  }
  mysqli_stmt_close($stmt);
}


?>
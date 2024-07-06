<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a class="active" href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>
</body>
</html>

<?php
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
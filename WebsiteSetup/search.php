<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchBar">
    <li><a class="active" href="search.php">Search</a></li>
  </div>
</ul><br><h2>Search by title</h2><br>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
</form><br>
</body>
</html>

<?php

require_once "config.php";

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$s1 = "SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = '$str'";
	$r1 = mysqli_query($link, $s1);
	if (mysqli_num_rows($r1) > 0) {
		while($row = mysqli_fetch_assoc($r1)) {
			echo "Name: " . $row["title"] . " | Order: " . $row["ordering"] . " | Region: " . $row["region"] . " | Types: " . $row["types"] . "<br>";
		}
	  } else {
		echo "Can't find name";
	  }
}

?>









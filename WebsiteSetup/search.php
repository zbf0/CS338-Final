<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right">
    <li><button class = "darkbuttom" onclick="dark_mode()"><img src='source/dark.jpg' style=width:37px;height:37px;></button></li>
  </div>
  <div style="float:right" class="searchB">
    <li><a class="active" href="search.php">Search</a></li>
  </div>
</ul><br><h2>Search</h2><br>
<form method="post">
<label>Search</label>
<input type="text" name="searchTitle" placeholder="name">
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

<?php
ini_set('display_errors', 0);
require_once "config.php";



if (isset($_POST["submit"])) {
	$name = $_POST["searchTitle"];

	$s1 = "SELECT titleid,title FROM titleAkas WHERE title = '$name' GROUP BY titleid";

    //echo $s;

	$r1 = mysqli_query($conn, $s1);
	if (mysqli_num_rows($r1) > 0) {
		echo "<table align = 'left' border = '1' cellpadding = '3' cellspacing = '2'>";
		echo "<tr>";
		echo "<td> Name </td>";
		echo "<td> Genres </td>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($r1)) {
			$movieid = $row["titleid"];
			$movie = $row["title"];
			if (strlen($movie) > 50){
				$movie = substr($movie, 0, 50) . '...';
			}
			echo "<tr>";  
			echo "<td><a href='info.php?movieid=".$movieid."'>" . $movie . "</a></td>";
			$s2 = "SELECT genres FROM titleBasics WHERE titleid = '$movieid' LIMIT 1";
			$r2 = mysqli_query($conn, $s2);
			if (mysqli_num_rows($r2) > 0) {
				if ($row2 = mysqli_fetch_assoc($r2)) {
					$genres = $row2["genres"];
					echo "<td>" . $genres . "</td>";
				}
			}
			echo "</tr>";
		}
	} else {
		echo "no movie found, try <a href='searchWide.php'>wide search</a><br>.";
	}
}



?>
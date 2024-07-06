<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchB">
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

<table align = "left" border = "1" cellpadding = "3" cellspacing = "2">  
<tr>  
<td> Name </td>
<td> Order </td>
<td> Region </td>
<td> Type </td>
</tr>

<?php

require_once "config.php";

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$s1 = "SELECT titleid,title,ordering,region,types FROM titleAkas WHERE title = '$str'";
	$r1 = mysqli_query($conn, $s1);
	if (mysqli_num_rows($r1) > 0) {
		while($row = mysqli_fetch_assoc($r1)) {
			$movieid = $row["titleid"];
			$order = $row["ordering"];
			echo "<tr>";  
			echo "<td><a href='info.php?movieid=$movieid&order=$order'>" . $row["title"] . "</a></td>";  
			echo "<td>" . $row["ordering"] . "</td>";
			echo "<td>" . $row["region"] . "</td>";
			echo "<td>" . $row["types"] . "</td>";
			echo "</tr>";
		}
	}
}

?>
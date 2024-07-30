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
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="about.php?dark=TRUE">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right">
    <li><button class = "darkbuttom" onclick="dark_mode()"><img src='source/dark.jpg' style=width:37px;height:37px;></button></li>
  </div>
  <div style="float:right" class="searchB">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>

<h2>HOT MOVIE</h2>

<table align = "left" border = "1" cellpadding = "3" cellspacing = "2">  
<tr>  
<td> Name </td>
<td> Rating </td>
</tr>

</body>

</html>

<!--main page, top 5 movies are shown here-->

<?php

ini_set('display_errors', 0);
require_once "config.php";



mysqli_query($conn, "CALL update_hot();");

$s1 = "SELECT titleid,averageRating FROM hot ORDER BY averageRating DESC LIMIT 5";
$r1 = mysqli_query($conn, $s1);
if (mysqli_num_rows($r1) > 0) {
  while($row = mysqli_fetch_assoc($r1)) {
    $movieid = $row["titleid"];
    $movie = "";
    $s2 = "SELECT title FROM titleAkas WHERE titleid = '$movieid'";
    $r2 = mysqli_query($conn, $s2);
    $row2 = mysqli_fetch_assoc($r2);
    if (mysqli_num_rows($r2) > 0) {
      $movie = $row2["title"];
    }
    echo "<tr>";
    echo "<td>" . $movie . "</a></td>";
    echo "<td>" . $row["averageRating"] . "</td>";
    echo "</tr>";
  }
}
?>

<select id="languageSelector">
    <option value="en">English</option>
    <option value="fr">French</option>
</select>
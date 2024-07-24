<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<style>
textarea {
  width: 100%;
  height: 90px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 1px;
  background-color: #f8f8f8;
  font-size: 14px;
  resize: none;
}
</style>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchB">
    <li><a class="active" href="search.php">Search</a></li>
  </div>
</ul>
</body>
</html>

<!--movie info, all comments and ratings are shown here-->

<?php
require_once "config.php";

// movie info
$movieid = $_GET['movieid'];

$s1 = "SELECT primaryTitle, startYear, endYear, genres FROM titleBasics WHERE titleId = '$movieid' LIMIT 1";
$s2 = "SELECT directorid FROM titleCrew WHERE titleId = '$movieid' LIMIT 1";
$s3 = "SELECT averageRating FROM titleratings WHERE titleid = '$movieid' LIMIT 1";

$r1 = mysqli_query($conn, $s1);
if (mysqli_num_rows($r1) > 0) {
  $row = mysqli_fetch_assoc($r1);
  echo "<h3>" . $row["primaryTitle"] ."</h3>";
  echo "Year: " . $row["startYear"] . " - " . $row["endYear"] . "<br>";
  echo "Genres: " . $row["genres"] . "<br>";
}

$r2 = mysqli_query($conn, $s2);
if (mysqli_num_rows($r2) > 0) {
  $row = mysqli_fetch_assoc($r2);
  $did = $row["directorid"];
  $sa = "SELECT primaryName FROM nameBasics WHERE personid = '$did'";
  $ra = mysqli_query($conn, $sa);
  if (mysqli_num_rows($ra) > 0) {
    $row = mysqli_fetch_assoc($ra);
    echo "Director: " . $row["primaryName"] . "<br>";
  }
}

$r3 = mysqli_query($conn, $s3);
if (mysqli_num_rows($r3) > 0) {
  $row = mysqli_fetch_assoc($r3);
  echo "Rating: " . $row["averageRating"] . "<br><br>";
}

// update user history
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $s = "DELETE FROM viewingHistory WHERE titleId = '$movieid'AND userid = ". $_SESSION["id"];
  if ($stmt = mysqli_prepare($conn, $s)){
    mysqli_stmt_execute($stmt);
  }
  $sql = "INSERT INTO viewingHistory (userId, titleId, date) VALUES (?, ?, ?);";
  if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "sss", $param_userId, $param_titleId, $param_date);
    $param_userId = $_SESSION["id"];
    $param_titleId = $movieid;
    $param_date = date("Y-m-d h:i:sa");
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// submit comment
?>

<form method="post">
<textarea id="text" placeholder="Type your comment here" name="comment" required></textarea>
<input type="text" placeholder="rating"  name="rating" required>
<input type="submit" name="submit">

</form><br>

<?php
if (isset($_POST["submit"])) {
  $comment = $_POST["comment"];
  if ($comment != "") {
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      $sql = "INSERT INTO comment (comment,rating,userId,titleId,date) VALUES (?, ?, ?, ?, ?);";
      if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $param_comment, $param_rating, $param_userId, $param_titleId, $param_date);
        $param_comment = $comment;
        $param_rating = $_POST["rating"];
        $param_userId = $_SESSION["id"];
        $param_titleId = $movieid;
        $param_date = date("Y-m-d h:i:sa");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      $s1 = "SELECT averageRating, numVotes FROM titleRatings WHERE titleId = '$movieid'";
      $r1 = mysqli_query($conn, $s1);
      if (mysqli_num_rows($r1) > 0) {
        $row = mysqli_fetch_assoc($r1);
        $newRating = ($row["averageRating"] * $row["numVotes"] + $_POST["rating"]) / ($row["numVotes"] + 1);
        $newNum = $row["numVotes"] + 1;
        $s2 = "UPDATE titleRatings SET averageRating = ?, numVotes = ? WHERE titleId = ?;";
        if($stmt = mysqli_prepare($conn, $s2)){
          mysqli_stmt_bind_param($stmt, "sss", $param_rating, $param_num, $param_titleId);
          $param_rating = $newRating;
          $param_num = $newNum;
          $param_titleId = $movieid;
          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);
        }
      }
    } else {
      header("location: login.php");
      exit;
    }
  }
}

// print comments
$s1 = "SELECT userId,comment,rating,date FROM comment WHERE titleId = '$movieid' ORDER BY date DESC";
$r1 = mysqli_query($conn, $s1);
if (mysqli_num_rows($r1) > 0) {
	while($row = mysqli_fetch_assoc($r1)) {
    $userId = $row["userId"];
		$s2 = "SELECT fname,lname FROM users WHERE id = '$userId'";
    $r2 = mysqli_query($conn, $s2);
    $user = mysqli_fetch_assoc($r2);
    if ($user["fname"] == NULL || $user["lname"] == NULL) {
      echo "Unknown";
    } else {
      echo $user["fname"] . " " . $user["lname"];
    }
    echo ":<br>" . $row["comment"] . "<br>Rating: " . $row["rating"] . str_repeat('&nbsp;', 20) . $row["date"] ."<br><br>";
	}
}

?>
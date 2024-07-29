<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainPageStyle.css"/>
<style>
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 1px;
  background-color: #f8f8f8;
  font-size: 14px;
  resize: none;
}
</style>
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

<!--contact form page, redirect to contactRecieved.php after submission-->

<form action="contactRecieved.php" method="POST">
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="    email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="content">content:</label>
    <br>
    <textarea id="content" placeholder="Type your content here" name="content" required></textarea>
    <br><br>
    <input type="submit">
</form>

</body>
</html>

<?php
ini_set('display_errors', 0);

?>

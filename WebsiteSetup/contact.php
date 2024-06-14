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
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a class="active" href="contact.php">Contact</a></li>
  <li><a href="user.php">User</a></li>
  <div style="float:right" class="searchBar">
    <li><a href="search.php">Search</a></li>
  </div>
</ul>

<form action="contact_recieved.php" method="post">
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="    email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="message">Message:</label>
    <br>
    <textarea id="message" placeholder="Type your message here" name="message" required></textarea>
    <br><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>
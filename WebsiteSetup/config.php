<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // change to your password (if you set the password)
define('DB_NAME', 'sampledb');
 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// SQL_READ
// read data from sql and run func to each output
// $sql: sql command
function SQL_READ($sql, $func) {
	$q = mysqli_query($conn, $sql);
	if (mysqli_num_rows($q) > 0) {
		while($row = mysqli_fetch_assoc($q)) {
			$func($q);
		}
	}
}






?>
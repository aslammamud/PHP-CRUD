<?php
$tablename = $_POST['tablename'];

if (!empty($tablename)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
	$dbname = "student";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {

		$sql = "CREATE TABLE $tablename (
			id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			pob VARCHAR(30) NOT NULL,
			dob VARCHAR(30) NOT NULL)";
			
		if (mysqli_query($conn, $sql)) {
		  echo "Table created successfully!";
		} else {
		  echo "Error creating database: " . mysqli_error($conn);
		}
		mysqli_close($conn);
    }
} else {
 die();
}

?>
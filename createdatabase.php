<?php
$databasename = $_POST['databasename'];

if (!empty($databasename)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";

    $conn = new mysqli($host, $dbUsername, $dbPassword);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {

		$sql = "CREATE DATABASE $databasename";
		if (mysqli_query($conn, $sql)) {
			echo "Database created successfully!"; 
		} else {
		  echo "Error creating database: " . mysqli_error($conn);
		}
		mysqli_close($conn);
    }
} else {
 die();
}

?>
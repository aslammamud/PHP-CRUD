<?php
$id = $_POST['id'];
$name = $_POST['name'];
$pob = $_POST['pob'];
$dob = $_POST['dob'];
if (!empty($id) || !empty($name) || !empty($pob) || !empty($dob)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "student";
	
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
	 $SELECT = "SELECT id From students Where id = ? Limit 1";
     $INSERT = "INSERT INTO students (id, name, pob, dob) values(?, ?, ?, ?)";
	 
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_result($id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("isss", $id, $name, $pob, $dob);
      $stmt->execute();
	  echo "New student record inserted sucessfully!";
	  header('Location: index.php');
     } else {
		  echo "Data not inserted! Please try again.";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>


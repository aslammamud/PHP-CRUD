<?php
if(isset($_POST['updateid'])){
		$key = $_POST['id'];		
		$id = $_POST['id'];
		$name = $_POST['name'];
		$pob = $_POST['pob'];
		$dob = $_POST['dob'];
	
		require('connection.php');

		 $update = mysqli_query($conn,"UPDATE students SET name='$name',pob='$pob',dob='$dob' WHERE id=$key ");
		 echo "Profile Updated Successfully!";
		 header('Location: index.php');

		 if(!isset($update)){
		 die ("Error $update".mysqli_connect_error());
		 }
}
?>
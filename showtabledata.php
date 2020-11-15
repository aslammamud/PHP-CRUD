<?php
require('connection.php');
$result = mysqli_query($conn, 'select * from students');

if(isset($_POST['editid'])){
		$key = $_POST['getid'];
		$editresult = mysqli_query($conn,"SELECT * FROM students where id = $key ");
}

if(isset($_POST['deleteid'])){
		$key = $_POST['getid'];
	
		$check = mysqli_query($conn,"SELECT * FROM students where id = $key ");
		
	if(mysqli_num_rows($check)>0){
		$queryDelete = mysqli_query($conn,"DELETE FROM students where id = $key ");
		header('Location: index.php');
	}
}


?>

<table class="main-table">
	<tr>
	    <th>Student-ID</th>
		<th>Name</th>
		<th>Place of Birth</th>
		<th>Date of Birth</th>
		<th>Select</th>
		<th>Delete</th>
		<th>Update</th>
	</tr>
		
		<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<form action="" method = "post" role="form">
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->name; ?></td>
			<td><?php echo $product->pob; ?></td>
			<td><?php echo $product->dob; ?></td>
			<td><input type="checkbox" name="getid" value="<?php echo $product->id; ?>" required> </td>
			<td><input type="submit" class="btn btn-default btn-rounded mb-4" name="deleteid" value="Delete"> </td>
			<td><input type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm" name="editid" value="Edit"></td>
			</form>
		</tr>
	<?php } ?>
</table>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Current Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-10">
	  <form action="updatestudent.php" method="POST">
		  <table class="floatform">
		  
			<?php 
			if($result->num_rows >0){
						 while($product = $editresult->fetch_assoc()){
							 $variable = $product['id'];
							 
					?>
		   <tr>
			<td style="padding-left:60px;">ID :</td>
			<td><input id="defaultForm-email" class="form-control validate" value =" <?php echo $product['id']; ?>" type="text" size="25" name="id" readonly></td>
		   </tr><tr>
			<td style="padding-left:60px;">Name :</td>
			<td><input id="defaultForm-email" class="form-control validate" value =" <?php echo $product['name']; ?>" type="text" size="25" name="name" required></td>
		   </tr><tr>
			<td style="padding-left:60px;">Place of Birth :</td>
			<td><input id="defaultForm-email" class="form-control validate" value =" <?php echo $product['pob']; ?>" type="text" size="25" name="pob" required></td>
		   </tr><tr>
			<td style="padding-left:60px;">Date of Birth :</td>
			<td><input id="defaultForm-email" class="form-control validate" value =" <?php echo $product['dob']; ?>" type="text" size="25" name="dob" required></td>
		   </tr>
		   <tr><td><input class="btn btn-default" type="submit" name="updateid" value="Update"></td>
			</tr>
		   <?php 
				}
				}
				?>
		  </table>
		 </form>
      </div>
    </div>
  </div>
</div>

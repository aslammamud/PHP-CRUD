<html>
<head>
  <title>PHP CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div class="header"><br><h1>PHP CRUD OPERATION</h1><br></div>
	
<div class="create">
<h2>Create any new database</h2>
<p>(Skip if you've already uploaded the sql file to database)</p>
<p>(To run this project database name should be `student` and create it only once)</p>
<form action="createdatabase.php" method="POST">
  <table>
   <tr>
    <td>Please enter database name you want to create: </td>
    <td><input type="text" name="databasename" required></td>
    <td><input type="submit" value="Create"></td>
   </tr>
  </table>
</form>
</div>

<div class="create">
<h2>Create new table</h2>
<form action="createtable.php" method="POST">
  <table>
   <tr>
    <td>Please enter table name you want to create: </td>
    <td><input type="text" name="tablename" required></td>
    <td><input type="submit" value="Create"></td>
   </tr>
  </table>
</form>
</div>


 <h1>Student Table From Database</h1>
 <div class="tab">
 <div>
 <h3>Insert new Student into database</h3>
 <form action="tablein.php" method="POST">
  <table>
   <tr>
    <td>ID :</td>
    <td><input type="text" name="id" required></td>
   </tr><tr>
    <td>Name :</td>
    <td><input type="text" name="name" required></td>
   </tr><tr>
    <td>Place of Birth :</td>
    <td><input type="text" name="pob" required></td>
   </tr><tr>
    <td>Date of Birth :</td>
    <td><input type="text" name="dob" required></td>
   </tr>
	<tr>
	<td></td>
    <td style="float: right; padding-top: 10px;"><input class="btn btn-success" type="submit" value="Insert"></td>
   </tr>
  </table>
 </form>
 </div>
	
 <div class="ofd">
 <h3>Search from database</h3>
 <?php require('tableout.php'); ?>
 
 </div>
 </div>

 <div class="Item">
	<h1>Search by place</h1>
<?php
require('connection.php');
		
$result = mysqli_query($conn, 'SELECT * FROM `students` WHERE pob ');

	
if(isset($_POST['searchbyplace'])){
$searchbyplace = $_POST['searchbyplace'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE pob = '$searchbyplace'");
    mysqli_close($conn);
	
}

?>

<form action="" method = "post" role="form">
<table class="main-table">
	<tr>
	<th colspan = "3">Enter Place: <input class="form-control validate" size="10" type="text" name="searchbyplace" required></th>
	<th style="padding-left:5px;"><input class="btn btn-success" type="submit" value="Search"></th>
	</tr>
	<?php if(mysqli_num_rows($result)>0){ ?>
	
		<tr>
			<th>Student-ID</th>
			<th>Name</th>
			<th>Place of Birth</th>
			<th>Date of Birth</th>
			
		</tr>
		<?php	while($product = mysqli_fetch_object($result)) { ?>
		
		<tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->name; ?></td>
			<td><?php echo $product->pob; ?></td>
			<td><?php echo $product->dob; ?></td>			
		</tr>
		<?php }}?>
</table>
</form>

</div>
  
 <div class="Item">
	<h1>Studet Database</h1>
	<?php require('showtabledata.php'); ?>
</div>
<div class="footer"><br>©Aslam Mamud<br></div>
</body>
</html>
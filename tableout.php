<?php
if(isset($_POST['search']))
{
	$search = $_POST['search'];
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "student";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$query = "SELECT * FROM students WHERE id = $search limit 1";
    
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
		$id = $row['id'];
		$name = $row['name'];
		$pob = $row['pob'];
		$dob = $row['dob'];
      }  
    }
	else {
			echo "This id does not exist!";
            $id = "";
            $name = "";
            $pob = "";
			$dob = "";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
	
}
else {    
            $id = "";
            $name = "";
            $pob = "";
			$dob = "";
    }
?>

<form method="POST">
 <table>
  <tr>
	<td>Enter Student ID: <input type="text" name="search" required></td>
    <td style="padding-left:5px;"><input class="btn btn-success" type="submit" value="Search"></td>
   </tr>
   <tr>
    <td>ID : <?php echo $id;?></td>
   </tr>
   <tr>
    <td>Name : <?php echo $name;?></td>
   </tr>
   <tr>
    <td>Place of Birth : <?php echo $pob;?></td>
   </tr>
   <tr>
    <td>Date of Birth : <?php echo $dob;?></td>
   </tr>
  </table>
 </form>
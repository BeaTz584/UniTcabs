

<!DOCTYPE html>
<html>
<head>
  <head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Display Teams</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>
</head>
<body>

<h2>Team Details</h2>

<table border="2">
  <tr>
    <td>Team ID</td>
    <td>User ID</td>
    <td>Unitoffer</td>
 
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php
include "DB.php";
//$records = $con->query("select * from teams");
$records = $con->query("select * from enrolment");

while($data = mysqli_fetch_array($records) ) 
{
   

?>
  <tr>
    <td><?php echo $data['TeamID']; ?></td>
    <td><?php echo $data['UserID']; ?></td>
    <td><?php echo $data['Unitoffer']; ?></td>   

    <td><a href="edit.php?id=<?php echo $data['TeamID']; ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $data['TeamID']; ?>">Delete</a></td>
  </tr>	

  
<?php
}
?>
</table>

</body>
</html>


<?php
//made changes to line 3 
include 'login.php';
include 'DB.php';
// include 'reg_proj.php';
// // Change this to your connection info.
// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'tcabs';
// // Try and connect using the info above.
// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if ( mysqli_connect_errno() ) {
// 	// If there is an error with the connection, stop the script and display the error.
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }
//queries 
$sqlresult = $con->query("SELECT Unitcode FROM unit") or die(mysqli_error($con)); 
?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register Project</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include 'navbar.php';?>
		<div class="register">
			<h1>Register Project</h1>
			<form action="reg_proj.php" method="post" autocomplete="off">
				<div class="form-group">
                        <label>Project Name<span style="color: red;">*</span></label>
                        <input  type="text" 
                                id="proj_name" 
                                name="proj_name"
                                class="form-control"
                                required></input>
                </div>
				
				<div class="form-group">
                        <label>Project Description <span style="color: red;">*</span></label>
                        <textarea   name="proj_desc" 
                                    id="proj_desc"
                                    rows="4" 
                                    cols="50" 
                                    class="form-control"
									placeholder="Add text here..."
                                    required></textarea>
                    </div>
					
				<label>Unit Code <span style="color: red;">*</span></label>
				<select name="unit_code" 
						id="unit_code" 
						required>
					<?php
					while ($row = mysqli_fetch_array($sqlresult)) {
						echo "<option value='" . $row['Unitcode'] . "'>" . $row['Unitcode'] . "</option>";
					}
					?> 
				</select><br>	
					<input type="submit" name="submit" class="btn btn-primary" value="Register">
			</form>
			<form action="reg_proj.php" method="post" autocomplete="off">
					<table class="table table-bordered">
						<thead>
							<tr>	 
								<th>Project ID</th>
								<th>Project Name</th>
								<th>Project Description</th>
								<th>Unit Code</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$tblresult = $con->query("SELECT * FROM projects");
							while ($row = mysqli_fetch_assoc($tblresult)) { 
							?>
								<tr>
									<td><?php echo $row['ProjectID'];?></td>
									<td><?php echo $row['Projectname'];?></td>
									<td><?php echo $row['Projectdesc'];?></td>
									<td><?php echo $row['Unitcode'];?></td>
									<td>
										<a href="Update_reg_proj.php?edit=<?php echo $row['ProjectID']; ?>" name='edit'>Edit</button>
									</td>
									<td>
										<a href="reg_proj.php?delete=<?php echo $row['ProjectID']; ?>" class="btn btn-danger" name='delete'>Delete</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
			</form>
		</div>
		<?php include 'Footer.php';?>	
	</body>
</html>

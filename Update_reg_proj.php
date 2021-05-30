<?php
// made changes to line 98
include 'login.php';
include 'DB.php';
$sqlresult = $con->query("SELECT Unitcode FROM unit") or die(mysqli_error($con));

$SQL2 = 'CALL UpdateProj(?,?,?,?)';
//when edit is clicked
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$stmt = $con->query("SELECT * FROM projects WHERE ProjectID = $id");
	// $stmt->bind_param('s', $_GET['edit']);
	// $stmt->execute();
	// $result = $stmt->get_result();
	// print_r($stmt);
		// if (count($result)== 1){
			$row = $stmt->fetch_assoc();
			$name = $row['Projectname'];
			$desc = $row['Projectdesc'];
			$unit_code = $row['Unitcode'];
			// echo($name);
			// echo($desc);
			// echo($unit_offer);
	'<script>
		window.location="Update_reg_proj.php";
	</script>';
		$stmt->close();
} else {
		echo '<script>alert("Project record failed to be editted.");");
		window.location="Reg_Project.php";
	</script>';
}

?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Update Project</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include 'navbar.php';?>
		<div class="register">
			<h1>Update Project</h1>
			<form method="post" autocomplete="off">
				<div class="form-group">
                        <label>Project Name<span style="color: red;">*</span></label>
                        <input  type="text" 
                                id="up_proj_name" 
                                name="up_proj_name" 
                                class="form-control"
								value="<?php echo $name; ?>"
                                required></input>
                </div>
				
				<div class="form-group">
                        <label>Project Description<span style="color: red;">*</span></label>
                        <textarea   name="up_proj_desc" 
                                    id="up_proj_desc"
                                    rows="4" 
                                    cols="50" 
                                    class="form-control"
									placeholder="Add text here..."
                                    required><?php echo $desc; ?></textarea>
                </div>
					
				<label>Unit Code <span style="color: red;">*</span></label>
				<select name="up_unit_code"  
						id="up_unit_code"
						required>
                    <?php
					while ($row = mysqli_fetch_array($sqlresult)) {
						echo "<option value='" . $row['Unitcode'] . "'>" . $row['Unitcode'] . "</option>";
					}
					?> 
				</select><br>
				<input type="submit" name="update" class="btn btn-primary" value="Update">
 			</form>
			<form action="reg_proj.php" method="post">
			<input type="submit" name="cancel" class="btn btn-danger" value="Cancel">
			</form>
		</div>
		<?php include 'Footer.php';?>	
	</body>
</html>

<?php
if (isset($_POST['update'])){
	$id = $_GET['edit'];
	if ($stmt = $con->prepare($SQL2)) {
		$stmt->bind_param('ssss', $_POST['up_proj_name'],$_POST['up_proj_desc'], $_POST['up_unit_code'], $id);
		$stmt->execute();
		if($con->error){
			echo '<script>alert("ERROR '.$con->error.'");
			window.location="Reg_Project.php"; 
			</script>';
			$stmt->close();
		} else{
			echo '<script>alert("Project updated successfully");
			window.location="Reg_Project.php";
			</script>';
			$stmt->close();
		}
		echo '<script>alert("Project updated successfully.");
		window.location="Reg_Project.php";
	</script>';
		$stmt->close();
	} else {
		echo '<script>alert("Project could not be updated.");
		window.location="Update_reg_proj.php";
	</script>';
	}
}
$con->close();
?>


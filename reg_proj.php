<?php
include 'DB.php';

$SQL = 'CALL RegProj(?,?,?)';
$SQL1 = 'CALL DeleteProj(?)';

//Insert into db when register button = clicked
if (isset($_POST['submit'])){
	if ($stmt = $con->prepare($SQL)) {
		$stmt->bind_param('sss', $_POST['proj_name'],$_POST['proj_desc'], $_POST['unit_code']);
		$stmt->execute();
		if($con->error){
			echo '<script>alert("ERROR '.$con->error.'");
			window.location="Reg_Project.php";
			</script>';
			$stmt->close();
		} else{
			echo '<script>alert("Project registered successfully");
			window.location="Reg_Project.php";
			</script>';
			$stmt->close();
		}
		echo '<script>alert("Project has been added successfully.");
		window.location="Reg_Project.php";
	</script>';
	} else {
		echo '<script>alert("Register could not be added.");
		window.location="Reg_Project.php";
	</script>';
	}
	$stmt->close();
}

//delete row when delete is clicked
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	if ($stmt = $con->prepare($SQL1)) {
		$stmt->bind_param('s', $id);
		$stmt->execute();
		if($con->error){
			echo '<script>alert("ERROR '.$con->error.'");
			window.location="Reg_Project.php";
			</script>';
			$stmt->close();
		} else{
			echo '<script>alert("Project deleted successfully");
			window.location="Reg_Project.php";
			</script>';
			$stmt->close();
		}
		echo '<script>alert("Project deleted successfully");
		window.location="Reg_Project.php";
		</script>';
	} else {
		echo '<script>alert("Project could not be deleted.");
		window.location="Reg_Project.php";
	</script>';
	}
$stmt->close();
}
if (isset($_POST['cancel'])){
	echo '<script>alert("Cancelled, redirecting to Register Projects.");
		window.location="Reg_Project.php";
	</script>';
}
$con->close();
?>


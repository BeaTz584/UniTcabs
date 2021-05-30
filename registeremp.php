
<?php
include 'login.php';

$SQL = 'CALL RegEmp(?,?,?,?,?,?,?)';

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form' + print_r($_POST));
}

if ($stmt = $con->Prepare($SQL)) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bind_param('sssssss', $_POST['username'], $password, $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['phonenumber'],$_POST['Role']);
	$stmt->execute();
	if($con->error){
		echo '<script>alert("ERROR '.$con->error.'");
		window.location="regemp.php";
	</script>';
	$stmt->close();
	}
	else{
	echo '<script>alert("Employee added successfully");
	window.location="regemp.php";
</script>';
	$stmt->close();
	}
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo '<script>alert("Could not prepare statement!");
	window.location="regemp.php";
</script>';
}
$con->close();
?>
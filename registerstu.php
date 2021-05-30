<?php include 'login.php';?>
<?php
$SQL = 'CALL Regstu(?,?,?,?,?)';
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['password']) || !isset($_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT Userid, password FROM user WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
if ($stmt = $con->Prepare($SQL)) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bind_param('sssss', $password, $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['phonenumber']);
	$stmt->execute();
	if($con->error){
		echo '<script>alert("ERROR '.$con->error.'");
		window.location="regstu.php";
	</script>';
	$stmt->close();
	}
	else{
	echo '<script>alert("Student added successfully");
	window.location="regstu.php";
</script>';
	$stmt->close();
	}
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}

} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
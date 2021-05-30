<?php
include 'login.php';
$SQL = 'CALL Regnewunit(?,?,@ErrMsg)';

// Make sure the submitted registration values are not empty.
if (empty($_POST['unitcode']) || empty($_POST['unitname'])) {
	// One or more values are empty.
	exit('Please complete the registration form' + print_r($_POST));
}
// We need to check if the account with that Unitname exists.
if ($stmt = $con->prepare('SELECT unitcode FROM unit WHERE unitcode = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['unitcode']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
			echo '<script>alert("unitcode exists, please choose another!");
	window.location="Regnewunit.php";
</script>';
	} else {
		// Username doesnt exists, insert new account
if ($stmt = $con->Prepare($SQL)) {
	$stmt->bind_param('ss', $_POST['unitcode'], $_POST['unitname']);
	$stmt->execute();
	
	$select = $con->query('SELECT @ErrMsg');
	$result = $select->fetch_assoc();
        $Out_ErrMsg = $result['@ErrMsg'];
  if (empty($Out_ErrMsg)) {
		echo '<script>alert("unit is added successfully.");
	window.location="regunit.php";
</script>';
	} else {
		echo 'Could not prepare statement!';
	}
	
	
	$stmt->close();
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
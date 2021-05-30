<?php require_once('db.php');
$SQL = 'CALL EnrolUnit(?,?,?,@ErrMsg)';

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['unitoffer']) || !isset($_POST['teamid']) || !isset($_POST['userid'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the enrolment form');
}
// Make sure the submitted enrolment values are not empty.
if (empty($_POST['unitoffer']) || empty($_POST['teamid']) || empty($_POST['userid']) ) {
	// One or more values are empty.
	exit('Please complete the enrolment form' . print_r($_POST));
}
// Call stored procedure to perform validation and insertion
if ($stmt = $con->Prepare($SQL)) {
	$stmt->bind_param('iis', $_POST['userid'], $_POST['unitoffer'], $_POST['teamid']);
	$stmt->execute();

	$select = $con->query('SELECT @ErrMsg');
	$result = $select->fetch_assoc();
        $Out_ErrMsg = $result['@ErrMsg'];

        if (empty($Out_ErrMsg)) {
		echo "<font color=green>Student is enrolled successfully</font>";
	} else {
		echo "<font color=red>$Out_ErrMsg</font>";
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo "<font color=red>Could not prepare statement!</font>";
}
$con->close();
?>
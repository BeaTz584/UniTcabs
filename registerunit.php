<?php
include 'login.php';
$SQL = 'CALL Regunit(?,?,?,?,?,?,?)';

if ($stmt = $con->Prepare($SQL)) {
	$stmt->bind_param('sssssss', $_POST['location'],$_POST['faculty'], $_POST['convenorID'], $_POST['year'], $_POST['semester'],$_POST['teachingperiod'],$_POST['unit']);
	$stmt->execute();
	  if($con->error){
        echo '<script>alert("ERROR '.$con->error.'");
        window.location="regunit.php";
    </script>';
    $stmt->close();
    }
    else{
    echo '<script>alert("Unit added successfully");
    window.location="regunit.php";
</script>';
    $stmt->close();
    }
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo '<script>alert("error");
	window.location="regunit.php";
</script>';
}
$con->close();
?>
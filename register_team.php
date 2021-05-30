<?php
include 'login.php';
$SQL = 'CALL RegTeam(?,?,?)';
if ($stmt = $con->Prepare($SQL)) {
	$stmt->bind_param('sss', $_POST['Teamname'], $_POST['Teamnumber'], $_POST['projects']);
	$stmt->execute();
	
	 if($con->error){
        echo '<script>alert("ERROR '.$con->error.'");
        window.location="Regteam.php";
    </script>';
    $stmt->close();
    }
    else{
    echo '<script>alert("team added successfully");
    window.location="Regteam.php";
</script>';
    $stmt->close();
    }
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo '<script>alert("team could not be added.");
	window.location="Regteam.php";
</script>';
}
$con->close();
?>



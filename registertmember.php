<?php
include 'login.php';
$SQL = 'CALL RegMem(?,?,?,?,?,?,?)';

if ($stmt = $con->Prepare($SQL)) {
	$stmt->bind_param("sssssss", $_POST['UserID'],$_POST['Teamnumber'],$_POST['Username'], $_POST['Firstname'],$_POST['Surname'],$_POST['ProjectID'],$_POST['Unitcode']);
	$stmt->execute();
	
	 if($con->error){
        echo '<script>alert("ERROR '.$con->error.'");
        window.location="Regtmember.php";
    </script>';
    $stmt->close();
    }
    else{
    echo '<script>alert("member added successfully");
    window.location="regtmember.php";
</script>';
    $stmt->close();
    }
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo '<script>alert("member could not be added.");
	window.location="regtmember.php";
</script>';
}
$con->close();
?>

<?php
include 'DB.php';
// We need to use sessions, so you should always start sessions using the below code.
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// If the user is not logged in redirect to the login page...
$stmt = $con->prepare('SELECT UserID FROM user WHERE Username = ?');
// In this case we can use the account ID to get the account info.
echo $con->error;
$stmt->bind_param('s', $_SESSION['name']);
$stmt->execute();
$stmt->bind_result($UID);
$stmt->fetch();
$stmt->close();

$URL = basename($_SERVER['PHP_SELF']);

$call = $con->prepare('CALL Login(?,?,@out)');
echo $con->error;
$call->bind_param('ss', $UID, $URL);
$call->execute();
$call->close();

$select = $con->query('SELECT @OUT');
$result = $select->fetch_assoc();
$out = $result['@OUT'];

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
else{
	if($out <> 1)
	{
		echo '<script>alert("You do not have access.");
	window.location="home.php";
</script>';
	}
}
?>
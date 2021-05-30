<?php
include 'login.php';

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT UserID, Password, Email FROM user WHERE Username = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['name']);
$stmt->execute();
$stmt->bind_result($UID, $password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<?php include 'head.php';?>
	<body class="loggedin">	
	<?php include 'navbar.php';?>
<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
				<tr>
						<td>ID:</td>
						<td><?=$UID?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="form-group">
					<input name="pass_change" class="btn btn-primary" type="pass_change" onClick="window.location='passchange.php';" value="Change Password"/>
				</div>
				</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php include 'Footer.php';?>
	</body>
</html>
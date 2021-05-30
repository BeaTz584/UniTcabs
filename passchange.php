<?php

include "login.php"; // Using database connection file here

include "navbar.php";

include "head.php";

$SQL = 'CALL passchange(?,?,?,?)';

$id = $_SESSION['id'];
$name = $_SESSION['name'];

if(isset($_POST['update'])) // when click on Update button
{

    if ($stmt = $con->prepare('SELECT UserId, password FROM user WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $name);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            $oldPassword = password_hash($_POST['oldPassword'], PASSWORD_BCRYPT);
            if (password_verify($_POST['oldPassword'], $password)) {
                if ($stmt = $con->prepare($SQL)) {
                    $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
                    $stmt->bind_param('ssss', $_SESSION['id'],$_POST['newPassword'], $_POST['rePassword'], $newPassword);
                    $stmt->execute();
                    if($con->error){
		echo '<script>alert("ERROR: '.$con->error.'");
		window.location="passchange.php";
	</script>';
	$stmt->close();
	}
	else{
	echo '<script>alert("Password changed successfully");
	window.location="passchange.php";
</script>';
	$stmt->close();
	}
            }
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }
    }
}
?>
<html>
	<body class="loggedin">	
<div class="content">
            <h3>Change Password</h3>
			<div>
				<p>Your account details are below:</p>
				<table>
				<tr>
						<td>ID:</td>
						<td><?=$_SESSION['id']?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
				</table>
                <br>
                <form method="POST">
  <input type="text" name="oldPassword"  placeholder="Enter Old Password" id="oldPassword" Required>
  <input type="text" name="newPassword" placeholder="Enter New Password" id="newPassword" Required>
  <input type="text" name="rePassword" placeholder="Repeat New Password" id="rePassword" Required>
  <input type="submit" name="update" value="Change Password">
</form>
			</div>
		</div>

		<?php include 'Footer.php';?>
	</body>
</html>
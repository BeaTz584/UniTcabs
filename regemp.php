<?php
include 'login.php';
$ResultSet = $con->query("SELECT Rolename FROM roles WHERE Rolename<>'Student'");
?>
<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register Employee</title>
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>

		<div class="register">
			<h1>Register Employee</h1>
			<form action="registeremp.php" method="post" autocomplete="off">
				<label for="firstname">
				<i class="fas fa-user"></i>
				</label>
				<input type="text" name="firstname" class="firstname" placeholder="Firstname" id="firstname" required>
				<label for="surname">
				<i class="fas fa-user"></i>
				</label>
				<input type="text" name="surname" class="surname" placeholder="Surname" id="surname" required>
				<label for="email">
				<i class="fas fa-at"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				<label for="phonenumber">
				<i class="fas fa-mobile-alt"></i>
				</label>
				<input type="text" name="phonenumber" placeholder="Phonenumber" id="phonenumber" size="38" required>
				<br />
				<label for="username">
				 <i class="far fa-user"></i>
				</label>
				<input type="text" name="username" class="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="Role">
				<i class="fas fa-shield-alt"></i>
				</label>
				<select name="Role" placeholder="Role" id="Role" required>
				<option selected disabled>User Role</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Rolename'] . "'>" . $row['Rolename'] . "</option>";
					}
					?>
					</select>
				<input type="submit" value="Register">
			</form>
		</div>
		<?php include 'Footer.php';?>
		<script>
			$("#firstname,#surname").change(function () {
    var addressArray = [$("#firstname").val().charAt(0), $("#surname").val()];
    $("#username").val(addressArray.join(''));
});
		</script>
	</body>
</html>

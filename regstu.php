<?php
include 'login.php';
?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register Student</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>

		<div class="register">
			<h1>Register Student</h1>
			<form action="registerstu.php" method="post" autocomplete="off">
				
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
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" onClick="window.location='CSV.php';" value="Import CSV">
				<input type="submit" value="Register">
			</form>
		</div>
		<?php include 'Footer.php';?>
	</body>
</html>

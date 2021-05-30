
<?php
include 'login.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Unit</title>
	<?php include 'head.php';?>
		<?php include 'navbar.php';?>
	</head>
	<body>


		<div class="register">
			<h1>Register New Unit</h1>
			<form action="Registernewunit.php" method="post" autocomplete="off">
			
			<label for="unitcode">
				<i class="fas fa-home"></i>
				</label>
				<input type="text" name="unitcode" class="unitcode" placeholder="unitcode" id="unitcode" required>
				
				<label for="unitname">
				<i class="fas fa-home"></i>
				</label>
				<input type="text" name="unitname" class="unitname" placeholder="unitname" id="unitname" required>				
				
				<input type="submit" value="Register">
			</form>
		</div>
		<?php include 'Footer.php';?>
	</body>
</html>

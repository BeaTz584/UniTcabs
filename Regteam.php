<?php include 'login.php';?>
<?php
include 'DB.php';
$ResultSet = $con->query("SELECT Projectname FROM projects");
?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register Team</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include 'navbar.php';?>

		<div class="register">
			<h1>Register Team</h1>
			<form action="register_team.php" method="post" autocomplete="off">
						
			<label for="Teamname">
				<i class="fas fa-user-alt"></i>
				</label>
				<input type="Text" name="Teamname" placeholder="Team Name" id="Teamname" required>

			<label for="Teamnumber">
				<i class="fas fa-user"></i>
				</label>
				<input type="text" name="Teamnumber" class="Teamnumber" placeholder="Team Number" id="Teamnumber" required>
			<label for="Project">
				<i class="fas fa-shield-alt"></i>
				</label>
			<select name="projects" placeholder="projects" id="projects" >
			    <option selected disabled>Project Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Projectname'] . "'>" . $row['Projectname'] . "</option>";
					}
					?>
			</select>
    
				<input type="submit" name='register' value="Register">
			</form>
		</div>
		<?php include 'Footer.php';?>

	</body>
</html>
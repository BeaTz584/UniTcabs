<?php include 'login.php';?>
<?php
include 'DB.php';
$ResultSet0 = $con->query("SELECT Firstname,Surname,Username FROM user JOIN (userroles, roles) ON (userroles.UserID=user.UserID AND roles.RoleID=userroles.RoleID) WHERE roles.Rolename='Student'");
$ResultSet1 = $con->query("SELECT UserID FROM user");
$ResultSet2 = $con->query("SELECT Firstname FROM user ");
$ResultSet3 = $con->query("SELECT Surname FROM user ");
$ResultSet4 = $con->query("SELECT Teamnumber FROM teams");
$ResultSet5 = $con->query("SELECT Year FROM year WHERE Year > '2020' ");
$ResultSet6 = $con->query("SELECT ProjectID FROM teams");
$ResultSet8 = $con->query("SELECT Username FROM user");
$ResultSet9 = $con->query("SELECT Semester FROM unitsoffering");
?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register team member</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>

		<div class="register">
			<h1>Register team member</h1>
			<form action="registertmember.php" method="post" autocomplete="off">
			
		
			<option selected disabled>User Name</option>
		        <select name="Username" placeholder="Username" id="Username" required>
				<?php
					while ($row = mysqli_fetch_array($ResultSet8)){
						echo "<option value='" . $row['Username'] . "'>" . $row['Username'] . "</option>";
					}
					?>
			</select>

			<option selected disabled>User ID</option>
				<select name="UserID" placeholder="UserID" id="UserID" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet1)){
						echo "<option value='" . $row['UserID'] . "'>" . $row['UserID'] . "</option>";
					}
					?>
				</select>

			<option selected disabled>Firstname</option>
			<select name="Firstname" placeholder="Firstname" id="Firstname" required>
				<?php
					while ($row = mysqli_fetch_array($ResultSet2)){
						echo "<option value='" . $row['Firstname'] . "'>" . $row['Firstname'] . "</option>";
					}
					?>
			</select>
			
			<option selected disabled>Surname</option>
				<select name="Surname" placeholder="Surname" id="Surname" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet3)){
						echo "<option value='" . $row['Surname'] . "'>" . $row['Surname'] . "</option>";
					}
					?>
				</select>			

			<option selected disabled>Team NO</option>
				<select name="Teamnumber" placeholder="Teamnumber" id="Teamnumber" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet4)){
						echo "<option value='" . $row['Teamnumber'] . "'>" . $row['Teamnumber'] . "</option>";
					}
					?>
				</select>
				
				<!--<option selected disabled>Year</option>-->
				<!--	<select name="Year" placeholder="Year" id="Year" required><br>-->
				<!--	<option selected disabled>Year</option>-->
				<!--
				<!--	while ($row = mysqli_fetch_array($ResultSet5)){-->
				<!--		echo "<option value='" . $row['Year'] . "'>" . $row['Year'] . "</option>";-->
				<!--	}-->
				<!--	?>-->
				<!--	</select><br>-->
					
					<option selected disabled>Project ID</option>
				<select name="ProjectID" placeholder="ProjectID" id="ProjectID" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet6)){
						echo "<option value='" . $row['ProjectID'] . "'>" . $row['ProjectID'] . "</option>";
					}
					?>
				</select><br>
				
				<!--<option selected disabled>Semster</option>-->
				<!--<select name="Semester" placeholder="Semester" id="Semester" required>-->
				<!--	
				<!--	while ($row = mysqli_fetch_array($ResultSet9)){-->
				<!--		echo "<option value='" . $row['Semester'] . "'>" . $row['Semester'] . "</option>";-->
				<!--	}-->
				<!--	?>-->
				<!--	</select>-->
					
<?php
// $year = isset($_GET['year']);
// $sem = isset( $_GET['Semester']);
$ResultSet11 = $con->query("SELECT Unitcode FROM unitsoffering");
?>
	            <option selected disabled>Unitcode</option>
				<select name="Unitcode" placeholder="Unitcode" id="Unitcode" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet11)){
						echo "<option value='" . $row['Unitcode'] . "'>" . $row['Unitcode'] . "</option>";
					}
					?>
					</select>
				<input type="submit" value="Register">
			</form>
		</div>
		<?php include 'Footer.php';?>
	</body>
</html>
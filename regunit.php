<?php
include 'login.php';
$ResultSet = $con->query("SELECT Unitname FROM unit");
$ResultSetY = $con->query("SELECT year FROM year WHERE year > '2020' ");
$ResultSetS = $con->query("SELECT Semester  FROM unitsoffering");
$ResultSetT = $con->query("SELECT teachingper  FROM teachingperiod");
?>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Register Unit</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>

		<div class="register">
			<h1>Register Unit</h1>
			<form action="registerunit.php" method="post" autocomplete="off">
				
				<label for="location">
				<i class="fas fa-location-arrow"></i>
				</label>
				<select name="location" placeholder="location" id="location" required>
				<option selected disabled>Location</option>
				<option value="Hawthorn">Hawthorn</option>;
					</select><br>

				<label for="faculty">
				<i class="fas fa-home"></i>
				</label>
				<input type="text" name="faculty" class="faculty" placeholder="Faculty" id="faculty" required><br>

				<label for="convenorID">
				<i class="fas fa-user-alt"></i>
				</label>
				<input type="convenorID" name="convenorID" placeholder="ConvenorID" id="convenorID" required><br>

				<label for="year">
				<i class="fas fa-calendar"></i>
				</label>
					<select name="year" placeholder="Year" id="year" required><br>
					<option selected disabled>Year</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSetY)){
						echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
					}
					?>
					</select><br>

				<label for="semester">
				 <i class="far fa-user"></i>
				</label>
				<select name="semester" placeholder="Semester" id="semester" required>
				<option selected disabled>Semester</option>
                    <option value="1">1</option>;
                    <option value="2">2</option>;
                    <option value="3">3</option>;
                    </select><br>

				<label for="Teachingperiod ">
					<i class="fas fa-lock"></i>
				</label>
				<select name="teachingperiod" placeholder="t4eachingperiod" id="teachingperiod" required>
				<option selected disabled>Teaching Period</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSetT)){
						echo "<option value='" . $row['teachingper'] . "'>" . $row['teachingper'] . "</option>";
					}
					?>
					</select><br>

				<label for="unit">
				<i class="fas fa-shield-alt"></i>
				</label>
				<select name="unit" placeholder="Unit" id="unit" required>
				<option selected disabled>Unit Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Unitname'] . "'>" . $row['Unitname'] . "</option>";
					}
					?>
					</select><br>
				<input type="submit" value="Register">
				<input type="submit" onClick="window.location='regnewunit.php';" value="Register New Unit">
				<input type="submit" onClick="window.location='listregconandunit.php';" value="Registered Units">
			</form>
		</div>
		<?php include 'Footer.php';?>
	</body>
</html>

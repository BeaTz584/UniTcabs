<?php
include 'login.php';
$ResultSet = $con->query("SELECT Unitoffer, Unitcode, Year, Semester FROM unitsoffering");
?>

<SCRIPT language=JavaScript>
function reload(form) {
  var v_uof = form.unitoffer.options[form.unitoffer.options.selectedIndex].value;
  self.location='enrolunit.php?unitoffer=' + v_uof;
}
</script>

<!DOCTYPE html>
<html>
	<head>
	<?php include 'head.php';?>
		<meta charset="utf-8">
		<title>Enrol Student</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include 'navbar.php';?>
        <?php @$uof=$_GET['unitoffer']; ?>

		<div class="register">
			<h1>Enrol Student</h1>

			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  include 'enrolmentunit.php';
			}
			?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
				<label for="unitoffer">
				<i class="fas fa-book-open" style="font-size:16px"><br>Unit Offer</br></i>
				</label>
				<select name="unitoffer" placeholder="Unit Offer" id="unitoffer" style="width:290px" onchange="reload(this.form)" required>
				<option selected disabled>Unit Offer</option>
					<?php
					echo "<option></option>";
					while ($row = mysqli_fetch_array($ResultSet)){
					  if ($row['Unitoffer'] == @$uof) {
						echo "<option selected value='" . $row['Unitoffer'] . "'>" . $row['Unitcode'] . ", Year " . $row['Year'] . ", Semester " . $row['Semester'] . "</option>";
					  } else {
						echo "<option value='" . $row['Unitoffer'] . "'>" . $row['Unitcode'] . ", Year " . $row['Year'] . ", Semester " . $row['Semester'] . "</option>";
					  }
					}
					?>
				</select>

				<label for="teamid">
				<i class="fas fa-users" style="font-size:16px"><br>Team</br></i>
				</label>
				<select name="teamid" placeholder="Team" id="teamid" style="width:290px" required>
				<option selected disabled>Team Name</option>
					<?php
					  if (isset($uof) && strlen($uof) > 0) {
						$ResultSet_team = $con->query("SELECT t.TeamID, t.Teamname, t.Teamnumber FROM teams t, projects p WHERE t.ProjectID = p.ProjectID AND p.Unitoffer = $uof");
					  } else {
						$ResultSet_team = $con->query("SELECT t.TeamID, t.Teamname, t.Teamnumber FROM teams t, projects p WHERE t.ProjectID = p.ProjectID");
					  }

					  echo "<option></option>";
					  while ($row = mysqli_fetch_array($ResultSet_team)){
						echo "<option value='" . $row['TeamID'] . "'>" . $row['Teamname'] . ", Team No " . $row['Teamnumber'] . "</option>";
					}
					?>
				</select>

				<label for="userid">
				<i class="fas fa-user"></i>
				</label>
				<input type="text" name="userid" class="userid" placeholder="Student ID" id="userid" maxlength="10" required>

				<input type="submit" value="Enrol">
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